<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');


Route::get('/reset-password/verify', 'App\Http\Controllers\Auth\ResetPasswordController@showVerificationPage');

Route::post('/reset-password/verify', 'App\Http\Controllers\Auth\ResetPasswordController@sendOTP');

Route::get('/reset-password/verify-otp', 'App\Http\Controllers\Auth\ResetPasswordController@getForVerifyOTP');

Route::post('/reset-password/verify-otp', 'App\Http\Controllers\Auth\ResetPasswordController@matchOTP');

Route::get('/password-update', 'App\Http\Controllers\Auth\ResetPasswordController@getForUpdatePassword');

Route::patch('/password-update', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');


Route::post('/register', 'App\Http\Controllers\MemberController@store');

Route::get('/register', 'App\Http\Controllers\MemberController@create');

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

    Route::delete('/delete/member/{id}', 'App\Http\Controllers\MemberController@delete');

    Route::patch('/edit/member/{id}', 'App\Http\Controllers\MemberController@update');

    Route::post('/edit/member', 'App\Http\Controllers\MemberController@edit');
    Route::get('/edit', 'App\Http\Controllers\MemberController@getidforedit');

    Route::post('/delete/member', 'App\Http\Controllers\MemberController@viewtodelete');
    Route::get('/delete', 'App\Http\Controllers\MemberController@getidfordelete');

    Route::get('/master/admin', 'App\Http\Controllers\AdminController@masterAdmin');

    Route::get('/admin/edit/member/role', 'App\Http\Controllers\AdminController@editRole');

    Route::post('/admin/edit/member/role', 'App\Http\Controllers\AdminController@edit');

    Route::patch('/admin/edit/member/role/{id}', 'App\Http\Controllers\AdminController@update');

    Route::get('/admin', 'App\Http\Controllers\AdminController@index');


//Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', 'App\Http\Controllers\HomeController@about');

Route::get('/rules-regulations', 'App\Http\Controllers\HomeController@rules');

Route::get('/contact', 'App\Http\Controllers\HomeController@contact');


Route::get('/', 'App\Http\Controllers\MemberController@index');
