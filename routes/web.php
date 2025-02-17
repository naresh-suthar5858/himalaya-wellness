<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BlockController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\himalaya\CetalogController;
use App\Http\Controllers\himalaya\ContactController;
use App\Http\Controllers\himalaya\ShowPageController;
use App\Http\Controllers\himalaya\ShowProductController;
use App\Http\Controllers\himalaya\CategoryProductController;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('himalaya.about');
})->name('about');

Route::get('/category', function () {
    return view('himalaya.categories');
})->name('category');

Route::post('/contact' , [ContactController::class , 'sendMessage'])->name('sendmessage');

Route::get('/category/{id}', [CategoryProductController::class, 'showProduct'])->name('category.product');

Route::post('/catelog', [CetalogController::class, 'show'])->name('cetalog.show');

Route::get('/product/{id}', [ShowProductController::class, 'showDetail'])->name('product.detail');


Route::get('/page-{url_key}', [ShowPageController::class, 'showPage'])->name('showPage-');

Route::get('admin/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('admin/login', [LoginController::class, 'loginPost'])->name('login.check');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    Route::get('/dashboard', [DashboardController::class, 'home'])->name('home');
    Route::resource('/slider', SliderController::class);
    Route::resource('/block', BlockController::class);
    Route::resource('/page', PageController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});
