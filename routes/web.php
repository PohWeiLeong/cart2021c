<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/addCategory', function () {
    return view('addCategory');
});

Route::post('/addCategory/store', [App\Http\Controllers\CategoryController::class, 'add'])->name('addCategory');

Route::get('/viewCategory', [App\Http\Controllers\CategoryController::class, 'view'])->name('viewCategory');

Route::get('/addProduct', function () {
    return view('addProduct', ['categoryID' => App\Models\Category::all()]);
});

Route::post('/addProduct/store', [App\Http\Controllers\productController::class, 'add'])->name('addProduct');

Route::get('/viewProduct', [App\Http\Controllers\productController::class, 'view'])->name('viewProduct');

Route::get('/editProduct/{id}', [App\Http\Controllers\productController::class, 'edit'])->name('editProduct');

Route::post('/updateProduct', [App\Http\Controllers\productController::class, 'update'])->name('updateProduct');

Route::get('/deleteProduct/{id}', [App\Http\Controllers\productController::class, 'delete'])->name('deleteProduct');



Route::get('/productDetail/{id}', [App\Http\Controllers\ProductController::class, 'productdetail'])->name('product.detail');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'viewProduct'])->name('products');

Route::get('/phone', [App\Http\Controllers\ProductController::class, 'phone'])->name('phone');
Route::get('/computer', [App\Http\Controllers\ProductController::class, 'computer'])->name('computer');


Route::post('/products', [App\Http\Controllers\ProductController::class, 'searchProduct'])->name('search.products');

Route::post('addCart', [App\Http\Controllers\CartController::class, 'add'])->name('add.to.cart');

Route::get('/myCart', [App\Http\Controllers\CartController::class, 'view'])->name('myCart');


Route::get('/myOrder', [App\Http\Controllers\OrderController::class, 'view'])->name('myOrder');


Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');

Route::get('/pdfReport', [App\Http\Controllers\OrderController::class, 'pdfReport'])->name('pdfReport');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');