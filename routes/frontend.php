<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderInformationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']);
//Product
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/cat/product/{slug}', [FrontendController::class, 'categoryProduct']);
Route::get('/product/{slug}', [FrontendController::class, 'singleProduct']);
Route::get('/product-search', [SearchController::class, 'search']);
//Cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add-cart', [CartController::class, 'addCart'])->name('cart.add');
Route::get('/cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart.delete');

//Information
Route::get('/about-us', function () {
    return view('frontend.file.about');
});
Route::get('/privacy-policy', function () {
    return view('frontend.file.privacy');
});
Route::get('/terms-condition', function () {
    return view('frontend.file.terms');
});
Route::get('/connect-with-us', function () {
    return view('frontend.file.contact');
});
Route::post('/messages', [FrontendController::class, 'message']);

//Auth Route
Route::get('/customer-login', [AuthController::class, 'login'])->name('customer-login');
Route::post('/login-store', [AuthController::class, 'logincheck']); 
Route::get('/customer-register', [AuthController::class, 'register']); 
Route::post('/customer-store', [AuthController::class, 'customer']);
Route::post('/customer-logout', [AuthController::class, 'logout'])->name('customer.logout');

//After customer Login
Route::group(['middleware'=>'customers','as'=>'Customer.', 'prefix'=>'customer', 'namespace'=>'Customer'],function(){
    Route::get('/dashboard', [OrderInformationController::class, 'dashboard']);
    Route::get('/all-orders', [OrderInformationController::class, 'allOrder']);
    Route::get('/order/invoice/{id}', [OrderInformationController::class, 'invoice']);
    //Profile Route
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/profile-update', [AuthController::class, 'profileUpdate']);
    //checkout
    Route::get('/checkout', [CartController::class, 'checkout']);
    //order
    Route::post('/order-store', [OrderInformationController::class, 'orderStore'])->name('order.store');
});

//geust checkout
Route::get('/guest-checkout', [CartController::class, 'guestCheckout']);
Route::post('/guest-order-store', [OrderInformationController::class, 'guestOrderStore']);