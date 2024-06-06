<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{


    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.products.product');
    }

    public function create()
    {

        $colors = Color::pluck('name', 'id');
        $categories = Category::where('parent_id', 0)->get(); // Fetch only main categories
        // $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');

        return view('admin.products.add_product', compact('colors', 'categories', 'brands'));
    }

    public function store(Request $request)
    {


        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'color_id' => 'nullable|exists:colors,id',
            'brand_id' => 'nullable|exists:brands,id',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'key' => 'nullable|array',
            'key.*' => 'required_with:key|string|max:255',
            'value' => 'nullable|array',
            'value.*' => 'required_with:value|string|max:255',
            'is_featured' => 'nullable',
            // Add more validation rules as needed
        ]);


        // Create a new product
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];
        $product->category_id = $validatedData['category_id'];
        $product->color_id = $validatedData['color_id'];
        $product->brand_id = $validatedData['brand_id'];
        $product->is_featured = $validatedData['is_featured'];
        // Add more fields as needed
        $product->save();

        // Handle file upload
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $file) {
                // shared function
                $uploadPath = "uploads/gallery/";
                // $file = $request->file('file');

                $extention = $file->getClientOriginalExtension();
                $filename = time() . '-' . rand(0, 99) . '.' . $extention;
                $file->move($uploadPath, $filename);

                $finalImageName = $uploadPath . $filename;

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_name' => $finalImageName
                ]);
            }
        }


        if (!empty($validatedData['key']) && !empty($validatedData['value'])) {
            foreach ($validatedData['key'] as $index => $key) {
                if (isset($validatedData['value'][$index])) {
                    ProductSpecification::create([
                        'product_id' => $product->id,
                        'key' => $key,
                        'value' => $validatedData['value'][$index]
                    ]);
                }
            }
        }

        Cache::forget('NewProduct');
        Cache::forget('inspired_products');
        Cache::forget('feature_product');

        // Redirect or return a response
         return redirect()->route('product.index')->with('success', 'Product created successfully.');
//        return 1;

    }


    // Display the specified resource.
    public function show($id)
    {
        // Your code here
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
        Product::destroy($id);
        Cache::forget('NewProduct');
        Cache::forget('inspired_products');
        Cache::forget('feature_product');
        return 1;
    }

    public function remove_from_featured($id)
    {
        //update product where id = $id make is_featured = Null

        $Product = Product::where('id', $id)->first();

        if ($Product) {
            // Update the is_featured column to null
            $Product->update(['is_featured' => null]);

            Cache::forget('feature_product');
            return redirect()->back()->with('success', 'Product removed from featured successfully.');
        }

        return redirect()->back()->with('error', 'Product is not featured.');

    }

}
