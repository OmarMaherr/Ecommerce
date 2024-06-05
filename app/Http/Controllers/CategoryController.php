<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{




    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.categories.category');
    }


    public function create()
    {
        $categories = Category::where('parent_id', 0)->get(); // Fetch only main categories
        return view('admin.categories.add_category', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => $request->input('parent_id') == 0 ? 'nullable' : 'exists:categories,id',
        ]);

        // If parent_id is 0, exclude it from the request
        if ($request->input('parent_id') == 0) {
            $data = $request->except('parent_id');
            try {
                $maxSortOrder = Category::where('parent_id', 0)->max('sort_order');
                $sort_order = $maxSortOrder + 1;
            } catch (ModelNotFoundException $e) {
                $sort_order = 1;
            }
            $data['sort_order'] = $sort_order;
        } else {
            $data = $request->all();
        }

        // Create the category
        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    // Display the specified resource.
    public function show($id)
    {
        // Your code here
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        // Fetch the category by ID from the database
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', 0)->get();


        // Pass the category data to the view for editing
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => $request->input('parent_id') == 0 ? 'nullable' : 'exists:categories,id', // Skip existence check if parent_id is 0
        ]);

        // Find the category by ID
        $category = Category::findOrFail($id);

        // If parent_id is 0, exclude it from the request
        if ($request->input('parent_id') == 0) {
            $data = $request->except('parent_id');
        } else {
            $data = $request->all();
        }

        // Update the category with the new data
        $category->update($data);

        // Redirect to a success page or somewhere else
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category and its children recursively
        $this->deleteCategoryAndChildren($category);

        return 1;
    }

    // Helper method to delete a category and its children recursively
    private function deleteCategoryAndChildren($category)
    {
        // Find all categories that have $category as their parent
        $children = Category::where('parent_id', $category->id)->get();

        // Delete each child category and its children recursively
        foreach ($children as $child) {
            $this->deleteCategoryAndChildren($child);
        }

        // Finally, delete the category itself
        $category->delete();
    }

    public function sort_category()
    {
        $categories = Category::where('parent_id', 0)->orderBy('sort_order', 'asc')->get();

        return view('admin.categories.sort_category', compact('categories'));
    }


    public function confirm_sort_category(Request $request) {
        // dd($request);

        $data = $request->all();
        
        foreach ($data as $item) {
            Category::where('id', $item['id'])->update(['sort_order' => $item['sort_number']]);
        }

        return response()->json(['status' => 'success'], 200);
    }
}
