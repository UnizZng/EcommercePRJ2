<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\CartController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Home*/

Route::get('/', [HomeController::class,'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get ('/logout', [HomeController::class,'logout']);
Route::get('/product_details/{id}',[ProductController::class, 'product_details']);



/*Orders*/
Route::get ('/all_orders', [OrderController::class,'all_orders']);
Route::get ('/edit_orders/{id}', [OrderController::class,'edit_orders']);
Route::post ('/update_order/{id}', [OrderController::class,'update_order']);
Route::get ('/delete_order/{id}', [OrderController::class,'delete_order']);
Route::get('/place_order', [OrderController::class,'place_order']);
Route::get('/sort_order/{id}', [OrderController::class,'sort_order']);


/*Categories*/
Route::get ('/view_categories', [CategoryController::class,'view_categories']);
Route::get ('/add_category', [CategoryController::class,'add_category']);
Route::post('/save_category',[CategoryController::class, 'save_category']);
Route::get('/delete_category/{id}',[CategoryController::class, 'delete_category']);
Route::get('/edit_category/{id}',[CategoryController::class, 'edit_category']);
Route::post('/update_category/{id}',[CategoryController::class, 'update_category']);


/*Brands*/
Route::get ('/view_brands', [BrandController::class,'view_brand']);
Route::get ('/add_brands', [BrandController::class,'add_brand']);
Route::post('/save_brand',[BrandController::class, 'save_brand']);
Route::get('/delete_brand/{id}',[BrandController::class, 'delete_brand']);
Route::get('/edit_brand/{id}',[BrandController::class, 'edit_brand']);
Route::post('/update_brand/{id}',[BrandController::class, 'update_brand']);


/*Products*/
Route::get ('/all_products', [ProductController::class,'all_products']);
Route::get ('/add_products', [ProductController::class,'add_product']);
Route::post ('/save_product', [ProductController::class,'save_product']);
Route::get('/delete_product/{id}',[ProductController::class, 'delete_product']);
Route::get('/edit_product/{id}',[ProductController::class, 'edit_product']);
Route::post('/update_product/{id}',[ProductController::class, 'update_product']);
Route::get ('/admin_search_product', [ProductController::class,'admin_search_product']);

/*Users*/
Route::get ('/all_users', [UserController::class,'all_users']);
Route::get('/delete_user/{id}',[UserController::class, 'delete_user']);
Route::get('/detail_user/{id}',[UserController::class, 'detail_user']);
Route::post('/update_user/{id}',[UserController::class, 'update_user']);
Route::get('/admin_search_user',[UserController::class, 'admin_search_user']);

/*Cart*/
Route::get('/cart', [CartController::class, 'view_cart']);
Route::get('/add_cart/{id}',[CartController::class, 'add_cart']);
Route::get('/remove_cart/{id}',[CartController::class, 'remove']);
Route::get('/plus_cart/{id}',[CartController::class, 'plus_quantity']);
Route::get('/minus_cart/{id}',[CartController::class, 'minus_quantity']);

/*Customers*/
Route::get('/index_home',[HomeController::class, 'index_home']);
Route::get('/search',[HomeController::class, 'user_search']);
Route::get('/user_order',[HomeController::class, 'user_order']);
Route::get('/sort_order_customer/{id}',[HomeController::class, 'sort_order_customer']);
Route::get('/sort_category/{id}',[HomeController::class, 'sort_category']);
Route::get('/sort_brand/{id}',[HomeController::class, 'sort_brand']);
Route::get('/order_info/{id}',[HomeController::class, 'order_info']);
Route::get('/cancel_order/{id}',[HomeController::class, 'cancel_order']);




