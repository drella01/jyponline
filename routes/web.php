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

Route::get('/',  [App\Http\Controllers\StoreController::class, 'index']);


Auth::routes();
Route::get('store/{store}/list', [App\Http\Controllers\StoreController::class, 'list'])->name('store.list');
Route::resource('store', App\Http\Controllers\StoreController::class);
//Route::resource('product', App\Http\Controllers\ProductController::class);
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/product/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
//Route::resource('order', App\Http\Controllers\OrderController::class);
Route::get('/order/create', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
Route::post('/order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
Route::get('/order/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
Route::get('/order/{order}/edit', [App\Http\Controllers\OrderController::class, 'edit'])->name('order.edit');
Route::post('/order/{order}', [App\Http\Controllers\OrderController::class, 'update'])->name('order.update');
Route::delete('/order/{order}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('order.destroy');
Route::resource('cart', App\Http\Controllers\CartController::class);
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');

/*Route::get('test',function(){
    Excel::import(new ProductImport, 'Articulospescaderia.xlsx');
    return 'success. All Products imported good!';
});*/
