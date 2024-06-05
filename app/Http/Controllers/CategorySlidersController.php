<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategorySlider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategorySlidersController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $category_sliders = CategorySlider::where('category_id', $id)->get();

        return view('admin.categories.category_sliders', compact('category', 'category_sliders'));
    }


    public function store(Request $request)
    {
//        dd($request);
        if ($request->hasFile('file')) {

            $uploadPath = "uploads/gallery/";

            $file = $request->file('file');

            $extention = $file->getClientOriginalExtension();
            $filename = time() . '-' . rand(0, 99) . '.' . $extention;
            $file->move($uploadPath, $filename);

            $finalImageName = $uploadPath . $filename;

            CategorySlider::create([
                'category_id' => $request->category_id,
                'image_name' => $finalImageName
            ]);

            return response()->json(['success' => 'Image Uploaded Successfully']);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    public function destroy($id) {
        $category_sliders = CategorySlider::find($id);

        if (!$category_sliders) {
            // return response()->json(['message' => 'Image not found.'], 404);
            return redirect()->route('slider')->withErrors([
                'error' => "Image not found."
            ]);
        }

        unlink($category_sliders->image_name);
        $category_sliders->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
        // return response()->json(['message' => 'Image deleted successfully.']);
    }

}
