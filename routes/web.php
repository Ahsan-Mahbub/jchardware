<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OrderInformationController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminOrderCreateController;
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

// Auth::routes();
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/admin', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    //Profile Update Route
    Route::post('/profile-store', [HomeController::class, 'store'])->name('profile.store');
    //Slider Route
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/list', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/status/{id}', [SliderController::class, 'status'])->name('slider.status');
        Route::post('store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('edit/{id}', [SliderController::class, 'edit']);
        Route::post('update', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });
    //Category Route
    Route::group(['prefix' => 'category'], function () {
        Route::get('/list', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/status/{id}', [CategoryController::class, 'status'])->name('category.status');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit']);
        Route::post('update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    //Product Route
    Route::group(['prefix' => 'product'], function () {
        Route::get('/list', [ProductController::class, 'index'])->name('product.index');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/status/{id}', [ProductController::class, 'status'])->name('product.status');
        Route::get('/feature/{id}', [ProductController::class, 'feature'])->name('product.feature');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    //Stock Route
    Route::group(['prefix' => 'stock'], function () {
        Route::get('/list', [StockController::class, 'index'])->name('stock.index');
        Route::get('create', [StockController::class, 'create'])->name('stock.create');
        Route::post('store', [StockController::class, 'store'])->name('stock.store');
    });
    //Setting Route
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/index', [SettingController::class, 'index'])->name('setting.index');
        Route::post('update/{id}', [SettingController::class, 'update'])->name('setting.update');
    });
    //Banner Route
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/index', [BannerController::class, 'index'])->name('banner.index');
        Route::post('update/{id}', [BannerController::class, 'update'])->name('banner.update');
    });
    //Message Route
    Route::group(['prefix' => 'message'], function () {
        Route::get('/list', [MessageController::class, 'index'])->name('message.index');
        Route::delete('destroy/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
    });
    //Order Route
    Route::group(['prefix' => 'order'], function () {
        Route::get('/customer-order-list', [OrderInformationController::class, 'index'])->name('order.index');
        Route::get('invoice/{id}', [OrderInformationController::class, 'invoice'])->name('order.invoice');
        Route::get('status/{id}', [OrderInformationController::class, 'status'])->name('order.status');
        Route::delete('destroy/{id}', [OrderInformationController::class, 'destroy'])->name('order.destroy');

        Route::get('/admin-order-list', [AdminOrderCreateController::class, 'index'])->name('order.admin.index');
        Route::get('/admin-order-create', [AdminOrderCreateController::class, 'create'])->name('order.admin.create');
        Route::post('/admin-order-search-product', [AdminOrderCreateController::class, 'getSearchProduct'])->name('order.search.product');
        Route::post('/admin-order-get-product-details', [AdminOrderCreateController::class, 'adminOrderGetProductDetails']);
    });
    //Report Route
    Route::group(['prefix' => 'report'], function () {
        //Stock Category Product Route
        Route::get('/stock', [ReportController::class, 'stockIndex'])->name('report.stock');
        Route::get('/get-stock', [ReportController::class, 'stockGet'])->name('report.stock.get');
    });
    //Customer Route
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/list', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });
});
