<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlateController;

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

