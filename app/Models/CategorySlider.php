<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'image_name',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
