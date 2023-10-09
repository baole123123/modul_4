<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Auth;

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


Route::put('categorie/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categorie.softdeletes');
Route::get('categorie/trash', [CategoryController::class, 'trash'])->name('categorie.trash');
Route::put('categorie/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categorie.restoredelete');
Route::get('categorie/destroy/{id}', [CategoryController::class, 'destroy'])->name('categorie_destroy');


Route::resource('categorie', CategoryController::class);
// Route::resource('borrowing', BorrowingController::class);


Route::put('product/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash');
Route::put('product/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product_destroy');


Route::resource('product', ProductController::class);

// Route::get('shop/master', [ShopController::class, 'master'])->name('shop.master');
Route::get('shop/master', [ShopController::class, 'index'])->name('shop.master');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/welcome', [AuthController::class, 'welcome']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/regenerate', [AuthController::class, 'regenerateSession']);

Route::get('/register', [ShopControllerntroller::class, 'register'])->name('shop.register');
Route::get('shop/register', [ShopController::class, 'register'])->name('shop.register');
Route::post('shop/checkRegister', [ShopController::class, 'checkRegister'])->name('shop.checkRegister');
Route::post('shop/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
Route::get('shop/login', [ShopController::class, 'login'])->name('shop.login');

Route::get('admin/login1', [CategoryController::class, 'login'])->name('admin.login1');
Route::post('admin/checklogin', [CategoryController::class, 'checklogin'])->name('admin.checklogin');



Route::get('shop/home', [ShopController::class, 'index'])->name('shop.home');
Route::get('shop/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');


Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');



