<?php
 
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// Admin category
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/admin_category',[CategoryController::class,'admin_category']);
Route::post('/category_store',[CategoryController::class,'category_store']);
Route::get('category/delete/{id}',[CategoryController::class,'destory'])->name('category.delete');

// Admin Product

Route::get('product_create',[CategoryController::class,'product_create'])->name('product.create');
Route::post('product_store',[CategoryController::class,'product_store'])->name('product.store');
Route::get('product_show',[CategoryController::class,'product_show'])->name('product.show');
 
Route::get('product_delete/{id}',[CategoryController::class,'product_delete'])->name('product.delete');
Route::get('/product_edit/{id}',[CategoryController::class,'product_edit']);
Route::post('/product/update/{id}',[CategoryController::class,'update'])->name('product.update');
Route::get('/product/details/{id}',[CategoryController::class,'details'])->name('product.details');
Route::post('/product/cart/{id}',[CategoryController::class,'cart'])->name('add.cart');
