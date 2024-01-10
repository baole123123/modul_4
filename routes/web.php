<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/checklogin', [AuthController::class, 'checklogin'])->name('checklogin');


Route::get('/forget-password', [AuthController::class, 'forgetPass'])->name('user.forgetPass');
Route::post('/forget-password', [AuthController::class, 'postForgetPass']);
Route::get('/get-password/{user}/{token}', [AuthController::class, 'getPass'])->name('user.getPass');
Route::post('/get-password/{user}/{token}', [AuthController::class, 'postGetPass']);


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    // Phần category
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::put('categorie/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categorie.softdeletes');
    Route::get('categorie/trash', [CategoryController::class, 'trash'])->name('categorie.trash');
    Route::put('categorie/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categorie.restoredelete');
    Route::get('categorie/destroy/{id}', [CategoryController::class, 'destroy'])->name('categorie_destroy');
    Route::resource('categorie', CategoryController::class);

    //// chuyển đổi ngôn ngữ
    Route::get('lang/change', [CategoryController::class, 'change'])->name('changeLang');


    // Phần product
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::put('product/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
    Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::put('product/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
    Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product_destroy');
});

// Route::get('shop/master', [ShopController::class, 'master'])->name('shop.master');
// trang chủ của người dùng
Route::get('shop/master', [ShopController::class, 'index'])->name('shop.master');
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
// Route::get('/welcome', [AuthController::class, 'welcome']);
// Route::get('/logout', [AuthController::class, 'logout']);
// Route::get('/regenerate', [AuthController::class, 'regenerateSession']);

// đăng ký người dùng

Route::get('/register', [ShopController::class, 'register'])->name('shop.register');
Route::get('shop/register', [ShopController::class, 'register'])->name('shop.register');
Route::post('shop/checkRegister', [ShopController::class, 'checkRegister'])->name('shop.checkRegister');
Route::post('shop/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
Route::get('shop/login', [ShopController::class, 'login'])->name('shop.login');
Route::post('shop/logout', [ShopController::class, 'logout'])->name('shop.logout');
// chi tiết
Route::get('shop/home', [ShopController::class, 'index'])->name('shop.home');
Route::get('shop/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');
//cart
Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');



Route::get('shop/checkOuts', [ShopController::class, 'checkOuts'])->name('checkOuts');


Route::resource('orders', \App\Http\Controllers\OrderController::class);
Route::post('/order', [OrderController::class, 'index'])->name('order');
Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::post('/add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('addToCart');
    Route::get('/shop/home/cart', [ShopController::class, 'homeCart'])->name('cart');
    Route::delete('/cart/destroy/{id}', [ShopController::class, 'cartDestroy'])->name('destroy-cart');
    Route::post('/checkout', [ShopController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/view', [ShopController::class, 'viewCheckout'])->name('view-checkout');
    Route::post('/checkout/add', [ShopController::class, 'storeCheckout'])->name('add');
    Route::get('/shop/show/{id}', [ShopController::class, 'show'])->name('shop.show');
});
Route::get('/xuat', [OrderController::class, 'exportOrder'])->name('xuat');



// Route::group(['prefix' => '/'], function () {
//     Route::get('/group', [GroupController::class, 'index'])->name('group.index');
//     Route::get('/add', [GroupController::class, 'create'])->name('group.create');
//     Route::post('/store', [GroupController::class, 'store'])->name('group.store');
//     Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
//     Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
//     Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
Route::resource('groups', GroupController::class);
Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');

// });






Route::group(['prefix' => '/'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/editpass/{id}', [UserController::class, 'editpass'])->name('user.editpass');
    Route::put('/updatepass/{id}', [UserController::class, 'updatepass'])->name('user.updatepass');
    Route::get('/adminpass/{id}', [UserController::class, 'adminpass'])->name('user.adminpass');
    Route::put('/adminUpdatePass/{id}', [UserController::class, 'adminUpdatePass'])->name('user.adminUpdatePass');
});

Route::get('/forget-password', [AuthController::class, 'forgetPass'])->name('user.forgetPass');
Route::post('/forget-password', [AuthController::class, 'postForgetPass']);
Route::get('/get-password/{user}/{token}', [AuthController::class, 'getPass'])->name('user.getPass');
Route::post('/get-password/{user}/{token}', [AuthController::class, 'postGetPass']);



Route::get('/change-password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'showChangePasswordForm'])->name('changePassword');
Route::post('/change-password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'changePassword'])->name('changePassword.submit');
