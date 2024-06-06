<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\SingleCategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\SendNotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index']);

//Route::get('/', function () {
//    return redirect(app()->getLocale());
//});
Route::group([
    'middleware' => 'setlocale',
], function() {
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'guest'], function () {

    Route::get("/register", [AuthController::class, 'register'])->name("register");

    Route::get("/login", [AuthController::class, 'login'])->name("login");

    Route::post('/register', [AuthController::class, 'store']);

    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/check_login', [AuthController::class, 'check_login'])->name("check_login");
    Route::post('/check_email', [AuthController::class, 'check_email'])->name("check_email");
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/profile.user', [AuthController::class, 'edit_user'])->name('edit.user');
    Route::post('/profile.password', [AuthController::class, 'edit_user_password'])->name('edit.password');
    Route::resource('wishlist', WishlistController::class);
    Route::resource('checkout', CheckoutController::class);
    Route::resource('order', OrderController::class);
    Route::post('/discount_apply', [DiscountController::class, 'discount_apply'])->name("discount_apply");

    Route::post('/save-push-notification-token', [SendNotificationController::class, 'savePushNotificationToken'])->name('save-push-notification-token');
});


Route::resource('cart', CartController::class);
Route::resource('single_product', SingleProductController::class);
Route::resource('categories', SingleCategoryController::class);
Route::resource('contact', ContactController::class);

Route::get('/convert-currency/{to}', [CurrencyController::class, 'convertCurrency'])->name("convert_currency");

Route::get('/form', [SendEmailController::class, 'loadForm']);
Route::post('/send/email', [SendEmailController::class, 'send'])->name('send')->middleware('throttle:1,3600');


Route::get('/change_lang/{lang}', [LangController::class, 'ChangeLang'])->name("ChangeLang");



});



