<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using closure based composers...
        View::composer('layout.layout', function ($view) {
            $categories = Category::where('parent_id', 0)->orderBy('sort_order', 'asc')->get();
            $view->with('categories', $categories);
        });
    }
}

