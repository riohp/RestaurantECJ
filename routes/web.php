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
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;


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
    return view('index');
});



Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('registration/store', [CustomAuthController::class, 'store'])->name('register.store');



Route::middleware(['auth', 'role:admin'])->group(function () {
    // modulo Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // modulo User
    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::post('/users/show', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/edit', [UserController::class, 'edit'])->name('users.edit');
    /* Route::put('/users/update', [UserController::class, 'update'])->name('users.update')->middleware('auth')->middleware('UserRequest'); */
    Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/activtate', [UserController::class, 'activate'])->name('users.activate');

});


Route::middleware(['auth', 'role:admin,waiter,cashier'])->group(function () {
    // modulo products
  Route::get('/products/index', [ProductController::class, 'index'])->name('products.index');
  Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
  Route::post('/products', [ProductController::class, 'store'])->name('products.store');
  Route::post('/products/show', [ProductController::class, 'show'])->name('products.show');
  Route::post('/products/edit', [ProductController::class, 'edit'])->name('products.edit');
  Route::put('/products/update', [ProductController::class, 'update'])->name('products.update');
  Route::delete('/products/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
  Route::post('/products/activate', [ProductController::class, 'activate'])->name('products.activate');


    //modulo Category
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/category/show', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/category/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/update', [CategoryController::class, 'activate'])->name('category.activate');


    //modulo Table
    Route::get('/table/index', [TableController::class, 'index'])->name('table.index');
    Route::get('/table/create', [TableController::class, 'create'])->name('table.create');
    Route::post('/table', [TableController::class, 'store'])->name('table.store');
    Route::get('/table/show/{id_table}/{id_category}', [TableController::class, 'show'])->name('table.show');
    Route::post('/table/edit', [TableController::class, 'edit'])->name('table.edit');
    Route::put('/table/update', [TableController::class, 'update'])->name('table.update');
    Route::delete('/table/destroy', [TableController::class, 'destroy'])->name('table.destroy');
    Route::post('/table/activate', [TableController::class, 'activate'])->name('table.activate');


    // module tablesProduct
    Route::post('/tables/product/store', [TableProductController::class, 'store'])->name('tablesProduct.store');
    Route::delete('/table/product/destroy', [TableProductController::class, 'destroy'])->name('tablesProduct.destroy');
    Route::post('/table/product/updateStatus', [TableProductController::class, 'updateStatus'])->name('tablesProduct.updateStatus');
    Route::post('/table/product/updateStatusItems', [TableProductController::class, 'updateStatusItems'])->name('tablesProduct.updateStatusItems');

    // module cooking
    Route::get('/cooking/index', [CookingController::class, 'index'])->name('cooking.index');
    Route::get('/cooking/create', [CookingController::class, 'create'])->name('cooking.create');
    Route::post('/cooking/store', [CookingController::class, 'store'])->name('cooking.store');
    Route::post('/cooking/show', [CookingController::class, 'show'])->name('cooking.show');
    Route::post('/cooking/edit', [CookingController::class, 'edit'])->name('cooking.edit');
    Route::put('/cooking/update', [CookingController::class, 'update'])->name('cooking.update');
    Route::delete('/cooking/destroy', [CookingController::class, 'destroy'])->name('cooking.destroy');
    Route::post('/cooking/activate', [CookingController::class, 'activate'])->name('cooking.activate');


    //module reservation
    Route::get('/reservation/index', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservation/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::get('/reservation/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
    Route::put('/reservation/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy');


});




Route::middleware(['auth', 'role:admin,cashier'])->group(function () {
    // module Invoice
    Route::post('/invoiceBill', [InvoiceController::class, 'invoiceBill'])->name('invoiceBill');
    Route::get('/invoice/index', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::delete('/invoice/{table}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
    Route::post('/invoice/show', [InvoiceController::class, 'show'])->name('invoice.show');


    // module delivery
    Route::get('/delivery/index', [DeliveryController::class, 'index'])->name('delivery.index');

    Route::get('/delivery/{delivery}/edit', [DeliveryController::class, 'edit'])->name('delivery.edit');
    Route::put('/delivery/{delivery}', [DeliveryController::class, 'update'])->name('delivery.update');
    Route::delete('/delivery/{delivery}', [DeliveryController::class, 'destroy'])->name('delivery.destroy');
    Route::post('/delivery/{delivery}', [DeliveryController::class, 'activate'])->name('delivery.activate');



});



Route::middleware(['auth', 'role:client'])->group(function () {
    // module delivery
    Route::get('/delivery/create', [DeliveryController::class, 'create'])->name('delivery.create');
    Route::post('/delivery/store', [DeliveryController::class, 'store'])->name('delivery.store');
    Route::get('/delivery/show/{id_delivery}/{id_category}', [DeliveryController::class, 'show'])->name('delivery.show');

    // module deliveryProduct
    Route::post('/delivery/product/store', [DeliveryProductController::class, 'store'])->name('deliverysProduct.store');
    Route::delete('/delivery/product/destroy', [DeliveryProductController::class, 'destroy'])->name('deliverysProduct.destroy');
    Route::post('/delivery/product/updateStatus', [DeliveryProductController::class, 'updateStatus'])->name('deliverysProduct.updateStatus');
    Route::post('/delivery/product/updateStatusItems', [DeliveryProductController::class, 'updateStatusItems'])->name('deliverysProduct.updateStatusItems');




    //module reservation
    Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

});






