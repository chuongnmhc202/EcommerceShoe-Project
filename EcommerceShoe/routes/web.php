<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('/add_category', [AdminController::class, 'add_category']);

Route::get('/delete_catagory/{catagory_id}', [AdminController::class, 'delete_catagory']);

Route::get('/view_brand', [AdminController::class, 'view_brand']);

Route::post('/add_brand', [AdminController::class, 'add_brand']);

Route::get('/delete_brand/{brands_id}', [AdminController::class, 'delete_brand']);

Route::get('/view_product', [AdminController::class, 'view_product']);

Route::post('/fetch-brand/{catagory_name}', [AdminController::class, 'fetchBrand']);

Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/show_product', [AdminController::class, 'show_product']);

Route::get('/delete_product/{product_id}', [AdminController::class, 'delete_product']);

Route::get('/update_product/{product_id}', [AdminController::class, 'update_product']);

Route::post('/update_product_confirm/{product_id}', [AdminController::class, 'update_product_confirm']);

Route::get('/order', [AdminController::class, 'order']);

Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
Route::get('/delivered_acp/{id}', [AdminController::class, 'delivered_acp']);
Route::get('/delivered_acp/{id}', [AdminController::class, 'delivered_acp']);
Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);
Route::get('/send_email/{id}', [AdminController::class, 'send_email']);
Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);




// HOME CONTROLLER 

Route::get('/product_details/{product_id}', [HomeController::class, 'product_details']);

Route::get('/product_list', [HomeController::class, 'product_list']);
Route::get('/product_search', [HomeController::class, 'product_search']);

Route::post('/add_cart/{product_id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('/show_order', [HomeController::class, 'show_order']);

Route::post('/add_comment/{id}', [HomeController::class, 'add_comment']);
Route::post('/add_reply/{id}', [HomeController::class, 'add_reply']);

Route::post('/upload_infor/{id}', [HomeController::class, 'upload_infor']);