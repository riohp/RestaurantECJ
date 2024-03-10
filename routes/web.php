<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TableProductController;
use App\Http\Controllers\InvoiceController;

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


// modulo User
Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');    
Route::post('/users/{user}', [UserController::class, 'activate'])->name('users.activate');    

// modulo Plate
Route::get('/table_product/index', [PlateController::class, 'index'])->name('table_product.index');
Route::get('/table_product/create', [PlateController::class, 'create'])->name('table_product.create');
Route::post('/table_product', [PlateController::class, 'store'])->name('table_product.store');
Route::get('/table_product/{product}', [PlateController::class, 'show'])->name('table_product.show');
Route::get('/table_product/{product}/edit', [PlateController::class, 'edit'])->name('table_product.edit');
Route::put('/table_product/{product}', [PlateController::class, 'update'])->name('table_product.update');
Route::delete('/table_product/{product}', [PlateController::class, 'destroy'])->name('table_product.destroy');
Route::post('/table_product/{product}', [PlateController::class, 'activate'])->name('table_product.activate');


//modulo Category
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('/category/{category}', [CategoryController::class, 'activate'])->name('category.activate');

//modulo Table
Route::get('/table/index', [TableController::class, 'index'])->name('table.index');
Route::get('/table/create', [TableController::class, 'create'])->name('table.create');
Route::post('/table', [TableController::class, 'store'])->name('table.store');
Route::post('/table/show', [TableController::class, 'show'])->name('table.show');
Route::get('/table/{table}/edit', [TableController::class, 'edit'])->name('table.edit');
Route::put('/table/{table}', [TableController::class, 'update'])->name('table.update');
Route::delete('/table/{table}', [TableController::class, 'destroy'])->name('table.destroy');
Route::post('/table/{table}', [TableController::class, 'activate'])->name('table.activate');

// module tablesProduct 
Route::post('/tables/product/store', [TableProductController::class, 'store'])->name('tablesProduct.store');
Route::delete('/table/product/destroy', [TableProductController::class, 'destroy'])->name('tablesProduct.destroy');


// module Invoice 
Route::post('/invoiceBill', [InvoiceController::class, 'invoiceBill'])->name('invoiceBill');
