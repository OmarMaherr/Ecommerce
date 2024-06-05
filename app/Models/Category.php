<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id' , 'sort_order'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            // Update related products
            $category->products()->update(['category_id' => null]);
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }





}
