<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ContactAdminController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FeaturedProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorySlidersController;
use Illuminate\Support\Facades\Route;
    Route::group(['middleware' => 'guest:admin'], function () {

        Route::get("/login", [AdminController::class, 'login'])->name("admin.login");

        Route::post('/login', [AdminController::class, 'authenticate']);
    });

    Route::middleware(['admin'])->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin.logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::post('/admin.profile', [AdminController::class, 'edit_admin'])->name('edit.admin');

        Route::get('/slider', [AdminController::class, 'slider'])->name('slider');
        Route::resource('slider', ImageController::class)->only('store');
        Route::delete('/slider/{id}', [ImageController::class, 'destroy'])->name('slider.destroy');


        Route::resource('category', CategoryController::class);
        Route::resource('category_slider', CategorySlidersController::class);

        Route::get('/sort_category', [CategoryController::class, 'sort_category'])->name('sort_category');
        Route::post('/sort_category', [CategoryController::class, 'confirm_sort_category'])->name('confirm.sort_category');


        Route::resource('brand', BrandController::class);


        Route::resource('color', ColorController::class);


        Route::resource('product', ProductController::class);


        Route::resource('featuredProduct', FeaturedProductController::class);


        Route::resource('map', MapController::class);


        Route::resource('discount', DiscountController::class);


        Route::resource('admin_order', AdminOrderController::class);

        Route::post('/change_status/change_status', [AdminOrderController::class, 'change_status'])->name('admin_order.change_status');


        Route::resource('contact_admin', ContactAdminController::class);
        Route::get('contact_admin/{id}', [ContactAdminController::class, 'show']);

        Route::post('/contact_admin/change_status', [ContactAdminController::class, 'change_status'])->name('contact_admin.change_status');


        Route::get('/profile', [AdminController::class, 'profile_admin'])->name('admin.profile');
        Route::post('/profile.user', [AdminController::class, 'edit_admin'])->name('admin.edit.admin');
        Route::post('/profile.password', [AdminController::class, 'edit_admin_password'])->name('admin.edit.password');


        Route::resource('users', AuthController::class);
        Route::post('/users/confirm_ban', [AuthController::class, 'confirm_ban_user'])->name('confirm.ban.user');

        Route::post('remove_from_featured/{id}', [ProductController::class, 'remove_from_featured'])->name('remove_from_featured');


        Route::group(['middleware' => ['role:super-admin|admin']], function () {

            Route::resource('permissions', App\Http\Controllers\PermissionController::class);
            Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

            Route::resource('roles', App\Http\Controllers\RoleController::class);
            Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
            Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
            Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

//            Route::resource('users', App\Http\Controllers\UserController::class);
//            Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

        });
    });

