<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;

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


Route::get('loai_sanpham/{type}','App\Http\Controllers\HotelController@getLoaiSp')->name('loai_sanpham');



Route::get('/homepage','App\Http\Controllers\HotelController@getIndex')->name('homepage');

Route::get('/about', function () {
    return view('page.about');
});
Route::get('/accommodation', function () {
    return view('page.accommodation');
});

Route::get('/contact', function () {
    return view('page.contact');
});
Route::get('/gallery', function () {
    return view('page.gallery');
});
Route::get('/blog', function () {
    return view('page.blog');
});
Route::get('/blog_detail', function () {
    return view('page.blog_detail');
});


Route::get('/login', function () {
    return view('user.login');
});
Route::post('/login','App\Http\Controllers\UserController@login')->name('login');


Route::get('/register', function () {
    return view('user.register');
});
Route::post('/register','App\Http\Controllers\UserController@register')->name('register');


Route::get('logout','App\Http\Controllers\UserController@logout')->name('logout');
Route::post('logout','App\Http\Controllers\UserController@logout')->name('logout');

Route::post('/checkout','App\Http\Controllers\HotelController@getCheckout')->name('checkout');
Route::post('book','App\Http\Controllers\HotelController@postCheckout')->name('book');


Route::get('detail/{id}','App\Http\Controllers\HotelController@getChitiet');
Route::post('detail/{id}','App\Http\Controllers\HotelController@postChitiet')->name('detail');


Route::get('admin','App\Http\Controllers\HotelController@getIndexAdmin')->name('admin');


Route::get('overview','App\Http\Controllers\HotelController@getOverview');


Route::get('admin-add-form','App\Http\Controllers\HotelController@getAdminAdd')->name('adminadd');
Route::post('admin-add-form','App\Http\Controllers\HotelController@postAdminAdd');

Route::post('/admin-delete/{id}', 'App\Http\Controllers\HotelController@postAdminDelete');

Route::get('/admin-edit-form/{id}', 'App\Http\Controllers\HotelController@getAdminEdit');
Route::post('/admin','App\Http\Controllers\HotelController@postAdminEdit');

Route::get('/return-vnpay', function () {					
     return view('vnpay.return-vnpay');					
    });					

