<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\LoginController;


use Illuminate\Http\Request;

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

<<<<<<< HEAD
Route::get('/language/{locale}', function ($locale) {
    App::setLocale($locale);
    session(['locale' => $locale]);
    return redirect()->route('categories.index');
});

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/login',[LoginController::class,'postLogin'])->name('postLogin');

=======
Route::get('/test',function( ){
    //Luu session
    //Global Session
        //Luu
        session( ['name' => 'Nguyen Van A'] );
        session( ['full_name' => 'Nguyen Van B'] );

    //Lay ra

    $value = session('full_name','Gia tri mac dinh');

    var_dump($value);
});

Route::get('/test-2',function(){
    //Lay ra
    $value = session('full_name','Gia tri mac dinh');
    var_dump($value);
});

Route::get('/test-3',function(Request $request ){
    //dd( $request->session() );

    $data = $request->session()->all();

    

    //luu
        $request->session()->put('name_1','Nguyen Van B');
    //lay
    $name_1 = $request->session()->get('name_1');

    //kiem tra
    $check  =  $request->session()->exists('name_1');
    var_dump( $check);

    //xoa tung session theo key
    $request->session()->forget('name_1');
    $request->session()->forget('full_name');
    $request->session()->forget('name');

    //lay lai tat ca cac session da duoc luu tru
    $data = $request->session()->all();

    echo '<pre>';
    print_r($data);
    echo '</pre>';

    $request->session()->push('name_1','Nguyen Van B');

});


Route::get('/them-vao-gio/{id}/{qty}',function(Request $request, $id, $qty ){
    //$request->session()->put('cart',[]);

    //lay ra bien cart , neu ko co thi mac dinh se la mang rong
    $cart = $request->session()->get('cart',[]);

    //thay doi mang cart
    $cart[$id] = $qty;


    //luu mang cart vao cart
    $request->session()->put('cart',$cart);

    //$request->session()->push('cart.'.$id, $qty );

    //lay ve gia tri moi nhat cua session cart
    $cart = $request->session()->get('cart',[]);

    echo '<pre>';
    print_r($cart);
    echo '</pre>';

    /*
        $cart = [
           3 => 1,
           5 => 1,
           6 => 2,
        ];
    */
});

Route::get('/gio-hang',function(Request $request ){
    $cart = $request->session()->get('cart',[]);

    echo '<pre>';
    print_r($cart);
    echo '</pre>';

    //TtozZfwdH-_M6hbufn4y5BT7vFbziXwzhVCZvCss5W1IIltH

    $data = $request->session()->all();

    echo '<pre>';
    print_r($data);
    echo '</pre>';

    //session

    $request->session()->regenerate();

    $data = $request->session()->all();
    echo '<pre>';
    print_r($data);
    echo '</pre>';


    //dang nhap vao 1 trang web
    //dung session de luu tru -> checkbox: ghi nho dang nhap => cookie
});     

