<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TableProductController;
use App\Http\Controllers\CookingController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DeliveryProductController;
use App\Http\Controllers\ReservationController;

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
Route::post('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::post('/users/show', [UserController::class, 'show'])->name('users.show');
Route::post('/users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');    
Route::post('/users/{user}', [UserController::class, 'activate'])->name('users.activate');


// modulo products
Route::get('/products/index', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::post('/products/show', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/products/{product}', [ProductController::class, 'activate'])->name('products.activate');


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
Route::post('/table/product/updateStatus', [TableProductController::class, 'updateStatus'])->name('tablesProduct.updateStatus');
Route::post('/table/product/updateStatusItems', [TableProductController::class, 'updateStatusItems'])->name('tablesProduct.updateStatusItems');

// module Invoice
Route::post('/invoiceBill', [InvoiceController::class, 'invoiceBill'])->name('invoiceBill');


// module delivery
Route::get('/delivery/create', [DeliveryController::class, 'create'])->name('delivery.create');
Route::post('/delivery/store', [DeliveryController::class, 'store'])->name('delivery.store');
Route::get('/delivery/index', [DeliveryController::class, 'index'])->name('delivery.index');
Route::post('/delivery/show', [DeliveryController::class, 'show'])->name('delivery.show');
Route::get('/delivery/{delivery}/edit', [DeliveryController::class, 'edit'])->name('delivery.edit');
Route::put('/delivery/{delivery}', [DeliveryController::class, 'update'])->name('delivery.update');
Route::delete('/delivery/{delivery}', [DeliveryController::class, 'destroy'])->name('delivery.destroy');
Route::post('/delivery/{delivery}', [DeliveryController::class, 'activate'])->name('delivery.activate');

// module cooking
Route::get('/cooking/index', [CookingController::class, 'index'])->name('cooking.index');
Route::get('/cooking/create', [CookingController::class, 'create'])->name('cooking.create');
Route::post('/cooking/store', [CookingController::class, 'store'])->name('cooking.store');
Route::post('/cooking/show', [CookingController::class, 'show'])->name('cooking.show');
Route::get('/cooking/{cooking}/edit', [CookingController::class, 'edit'])->name('cooking.edit');
Route::put('/cooking/{cooking}', [CookingController::class, 'update'])->name('cooking.update');
Route::delete('/cooking/{cooking}', [CookingController::class, 'destroy'])->name('cooking.destroy');
Route::post('/cooking/{cooking}', [CookingController::class, 'activate'])->name('cooking.activate');

// module invoice
Route::get('/invoice/index', [InvoiceController::class, 'index'])->name('invoice.index');
Route::delete('/invoice/{table}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
Route::post('/invoice/show', [InvoiceController::class, 'show'])->name('invoice.show');




// module invoiceProduct
Route::post('/invoice/product/store', [DeliveryProductController::class, 'store'])->name('deliverysProduct.store');
Route::delete('/invoice/product/destroy', [DeliveryProductController::class, 'destroy'])->name('deliverysProduct.destroy');
Route::post('/invoice/product/updateStatus', [DeliveryProductController::class, 'updateStatus'])->name('deliverysProduct.updateStatus');
Route::post('/invoice/product/updateStatusItems', [DeliveryProductController::class, 'updateStatusItems'])->name('deliverysProduct.updateStatusItems');

//module reservation
Route::get('/reservation/index', [ReservationController::class, 'index'])->name('reservation.index');
Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');
Route::get('/reservation/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::put('/reservation/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
Route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy');


