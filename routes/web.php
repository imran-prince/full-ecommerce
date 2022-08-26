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
