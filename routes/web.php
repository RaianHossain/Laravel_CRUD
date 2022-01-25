<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', function(){
    return view('welcome');
});

// Route::get('/home', function(){
//     return view('backend.home');
// });

Route::get('/home', function(){
    return view('backend.home');
});









Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// GET	/photos/{photo}	show	photos.show
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// GET	/photos/{photo}/edit	edit	photos.edit
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// PUT/PATCH	/photos/{photo} update	photos.update
Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

// DELETE	/photos/{photo}	destroy	photos.destroy
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


//For products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');