<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



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

//bài tập 1
// Route::get('login', function () {
//     return view('bai1.login');
// });
// Route::post('/login', function (Illuminate\Http\Request $request){
//     $username = $request->username;
//     $password = $request->password;
//     if ($username == 'admin' && $password == '123') {
//         return view('bai1.welcom_admin');
//     }
//     return view('bai1.no_welcom');
// });


//bài tập 2
// Route::get('product' , function(){
//     return view ('bai2.product');
// });
// Route::post('/product' , function  (Illuminate\Http\Request $request) {
//     $product = $request->product;
//     $price = $request->price;
//     $percent = $request->percent;

//     $amount = $price * $percent * 0.1;

//     return view('bai2.display', compact([ 'amount', 'product', 'price', 'percent']));

// });


//bài tập 3
// Route::get('dictionary' , function(){
//         return view ('bai3.dictionary');
//     });
// Route::post('/dictionary', function (Illuminate\Http\Request $request) {
//     $dictionary = [
//         "apple" => "quả táo",
//         "banana" => "quả chuối",
//         "cat" => "con mèo",
//         "dog" => "con chó"
//     ];

//     foreach($dictionary as $anh => $viet){
//         if($anh == $request->dictionary){
//         return view('bai3.show' , compact(['viet']));
//         }
//         if($viet == $request->dictionary){
//          return view('bai3.show1' , compact(['anh']));

//         }

//     }
//     return view('bai3.loi');

// });


//truyền tham số bắt buộc
// Route::get('/users/{id}/profile/{profile}' , function ($id , $profile){
//     echo 'tích 2 tham số:  ' . $id * $profile;
// });


    // tạo route liệt kê
    // Route::get('/user' , [UserController::class , 'index'])->name('user.index');
    // //tạo route thêm
    // Route::get('/user/create' , [UserController::class , 'create'])->name('user.create');
    // //tạo route sửa
    // Route::get('/user/edit/{id}' , [UserController::class , 'edit'])->name('user.edit');
    // //
    // Route::post('/user/store' , [UserController::class , 'store'])->name('user.store');
    // //tạo route update
    // Route::put('/user/{id}', [UserController::class , 'update'])->name('user.update');
    // //tạo route xóa
    // Route::delete('/user/{id}', [UserController::class , 'delete'])->name('user.delete');
    // //xem chi tiết
    // Route::get('/users/{user}', [UserController::class , 'show'])->name('user.show');

    // Route::get('/' , function (){
    //     return view ('admin.master');
    // });
    Route::resource('categorie', CategoryController::class);
    // Route::resource('borrowing', BorrowingController::class);

    Route::resource('product', ProductController::class);

