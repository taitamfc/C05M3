<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

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
})->name('home');

Route::get('/hello', function () {
    return view('hello');
});

//
Route::delete('/delete/123',function(){
    dd(123);
});

Route::get('/delete/123',function(){
    dd(123);
});

Route::get('/giao-vien/{teacher_id}/{course_id}/{subject_id?}',function( $teacher_id,$course_id, $subject_id = 0 ){
    dd($teacher_id .' - '. $course_id.' - '. $subject_id);
});

Route::post('dang-nhap-123',function(){
    dd('Dang Nhap');
})->name('login');

/*
    Dat nam cho router, goi o view bang ham
    route('login')
*/ 

/*
Chi dinh routing lam viec voi controller
*/
Route::get('/create',[App\Http\Controllers\HomeController::class,'create']);

/*
    Quan ly san pham
    Quan ly don hang
*/

Route::get('don-hang/index',function(){
    return 'Danh sach don hang';
});

Route::get('don-hang/show/{id}',function($id){
    return 'Xem chi tiet don hang';
});


Route::get('don-hang/create',function(){
    return 'Them moi don hang';
});
Route::post('don-hang/store',function(){
    return 'Luu moi don hang';
});

Route::get('don-hang/edit/{id}',function($id){
    return 'Sua don hang';
});
Route::put('don-hang/update/{id}',function($id){
    return 'Cap nhat don hang';
});

Route::delete('don-hang/delete/{id}',function($id){
    return 'Xoa don hang';
});

Route::prefix('don-hang')->group( function(){
    Route::get('/index',function(){
        return 'Danh sach don hang';
    });

    Route::get('/create',function(){
        return 'Them moi don hang';
    });
});

Route::prefix('san-pham')->group( function(){
    Route::get('/index',function(){
        return 'Danh sach don hang';
    });
    
    Route::get('/create',[HomeController::class,'create']);
});

Route::resource('products',ProductsController::class);

//Route::get( 'admin/dashboard',\App\Http\Controllers\Admin\ProductsController::class )->middleware('CheckAge');

Route::get( 'admin/dashboard',\App\Http\Controllers\Admin\ProductsController::class );

Route::resource('photos',ProductsController::class);





