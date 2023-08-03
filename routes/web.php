<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'),
// 'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum', 'verified'
])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

Route::get('/', [HomeController::class,'index']);



route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified')->name('redirect');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');


Route::get('/view_category', [AdminController::class,'view_category'])->name('view_category');
Route::POST('/add-category', [AdminController::class,'add_category'])->name('add-category');
Route::get('/delete-category/{id}', [AdminController::class,'delete_category'])->name('delete-category');


Route::get('/order', [AdminController::class,'order'])->name('order');
Route::get('/search', [AdminController::class,'searchdata'])->name('search');
Route::get('/delivered/{id}', [AdminController::class,'delivered'])->name('delivered');
Route::get('/print-pdf/{id}', [AdminController::class,'print_pdf'])->name('print-pdf');
Route::get('/send-email/{id}', [AdminController::class,'send_email'])->name('send-email');
Route::post('/send-user-email/{id}', [AdminController::class,'send_user_email'])->name('send-user-email');

Route::resource('products', ProductController::class);
Route::get('/product_details/{id}',[ HomeController::class, 'product_details'])->name('product_details');



// frontend
Route::post('/add-cart/{id}',[ HomeController::class, 'add_cart'])->name('add-cart');
Route::get('/show-cart',[ HomeController::class, 'show_cart'])->name('show-cart');
Route::get('/remove-cart/{id}',[ HomeController::class, 'remove_cart'])->name('remove-cart');

Route::get('/cash-order',[ HomeController::class, 'cash_order'])->name('cash-order');
Route::get('/stripe/{totalprice}',[ HomeController::class, 'stripe'])->name('stripe');
Route::post('/stripe/{totalprice}', [HomeController::class, 'stripepost'])->name('stripe.post');


Route::get('/show-order',[ HomeController::class, 'show_order'])->name('show-order');
Route::get('/cancel-order/{id}',[ HomeController::class, 'cancel_order'])->name('cancel-order');

Route::post('/add-comment',[ HomeController::class, 'add_comment'])->name('add-comment');
Route::post('/add-reply',[ HomeController::class, 'add_reply'])->name('add-reply');