<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\LoginController;
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

/* Admin */
Route::group(['middleware' => 'auth','prefix' => 'admin'], function()
{
    Route::get('/dashboard',DashboardController::class)->name('dashboard');
    Route::resource('products',ProductsController::class);
    Route::resource('categories',CategoriesController::class);
    Route::resource('tags',TagsController::class);
    Route::resource('users',UsersController::class);
});

Route::get('/language/{locale}', function ($locale) {
    App::setLocale($locale);
    session(['locale' => $locale]);
    return redirect()->route('categories.index');
});

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/login',[LoginController::class,'postLogin'])->name('postLogin');

