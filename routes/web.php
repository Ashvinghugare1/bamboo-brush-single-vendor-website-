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

// Route::middleware(['auth:sanctum', 'verified'
// ])->get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

Route::get('/', [HomeController::class,'index']);



route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth')->name('redirect');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');


Route::get('/view_category', [AdminController::class,'view_category'])->name('view_category');
Route::POST('/add-category', [AdminController::class,'add_category'])->name('add-category');
Route::get('/delete-category/{id}', [AdminController::class,'delete_category'])->name('delete-category');
// Route::POST('/edit-category/{id}', [AdminController::class,'edit_category'])->name('edit-category');

Route::resource('products', ProductController::class);