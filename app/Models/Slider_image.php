<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function showDropzone()
{
    $images = Slider_image::all(); // Retrieve all images from the database
    return view('slider')->with('images', $images);
}
}
