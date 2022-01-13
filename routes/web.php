<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;



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

Route::get('/import',[TransactionController::class,'index']);
Route::post('/imports',[TransactionController::class,'store'])->name('imports');

Route::get('/products',[ProductController::class,'index']);
Route::post('/imports_products',[ProductController::class,'store'])->name('imports_products');