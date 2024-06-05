<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'category_id',
        'name',
        'color_id',
        'brand_id',
        'description',
        'price',
        'is_featured',
    ];


        /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the color that owns the product.
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Get the brand that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the images for the product.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function specification()
    {
        return $this->hasMany(ProductSpecification::class);
    }

}
