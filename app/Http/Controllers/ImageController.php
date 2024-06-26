<?php

namespace App\Http\Controllers;

use App\Models\Slider_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {


            // shared function
            $uploadPath = "uploads/gallery/";

            $file = $request->file('file');

            $extention = $file->getClientOriginalExtension();
            $filename = time() . '-' . rand(0, 99) . '.' . $extention;
            $file->move($uploadPath, $filename);

            $finalImageName = $uploadPath . $filename;

            Slider_image::create([
                'name' => $finalImageName
            ]);


            // Clear the existing cache
            Cache::forget('Slider_image');

            return response()->json(['success' => 'Image Uploaded Successfully']);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }



    public function destroy($id)
    {
        $image = Slider_image::find($id);

        if (!$image) {
            return redirect()->route('slider')->withErrors([
                'error' => "Image not found."
            ]);
        }

        unlink($image->name);
        $image->delete();
        Cache::forget('Slider_image');

        return redirect()->route('slider')->with('success', 'Image deleted successfully.');
    }
}
