<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Models\Category;
use App\Models\CategorySlider;
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

        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', 0)->get();

        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => $request->input('parent_id') == 0 ? 'nullable' : 'exists:categories,id', // Skip existence check if parent_id is 0
        ]);

        $category = Category::findOrFail($id);

        if ($request->input('parent_id') == 0) {
            $data = $request->except('parent_id');
        } else {
            $data = $request->all();
        }

        $category->update($data);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $this->deleteCategoryAndChildren($category);

        return 1;
    }

    private function deleteCategoryAndChildren($category)
    {
        $children = Category::where('parent_id', $category->id)->get();

        foreach ($children as $child) {
            $this->deleteCategoryAndChildren($child);
        }

        $category->delete();
    }

    public function sort_category()
    {
        $categories = Category::where('parent_id', 0)->orderBy('sort_order', 'asc')->get();

        return view('admin.categories.sort_category', compact('categories'));
    }


    public function confirm_sort_category(Request $request) {

        $data = $request->all();

        foreach ($data as $item) {
            Category::where('id', $item['id'])->update(['sort_order' => $item['sort_number']]);
        }

        return response()->json(['status' => 'success'], 200);
    }



}
