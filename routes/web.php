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
// prefix
 



// Admin category
Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
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
Route::get('cart/show',[CategoryController::class,'cart_show'])->name('cart.show');
Route::get('cart/remove/{id}',[CategoryController::class,'remove'])->name('remove.cart');
Route::get('cash/payment',[CategoryController::class,'cash'])->name('cash.payment');
Route::get('stripe/payment/{totalprice}',[CategoryController::class,'stripe'])->name('stripe.payment');
Route::post('stripe/{totalprice}',[CategoryController::class, 'stripePost'])->name('stripe.post');
Route::get('admin/order',[CategoryController::class, 'admin_order'])->name('admin.order');
Route::get('admin/delivery/{id}',[CategoryController::class, 'delivery'])->name('admin.delivery');
Route::get('admin/pdf/{id}',[CategoryController::class, 'pdf'])->name('print.pdf');
Route::post('admin/search',[CategoryController::class, 'search'])->name('admin.search');
Route::get('order/show',[CategoryController::class, 'order_show'])->name('order.show');
Route::get('order/cancel/{id}',[CategoryController::class, 'order_cencel'])->name('order.cancel');
Route::get('/user_search',[CategoryController::class, 'user_search']) ;
Route::get('all/product',[CategoryController::class, 'all_product'])->name('all.product') ;
Route::get('contact',[CategoryController::class, 'contact'])->name('contact') ;
Route::get('blog',[CategoryController::class, 'blog'])->name('blog') ;
