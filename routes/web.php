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

Route::get('/', function () {
    return view('welcome');
});

//-----------------------------------------------------------------------------------------
// user & admin
// register
Route::get('/register','AuthController@register')->name('auth.register');
Route::post('/doregister','AuthController@doregister')->name('auth.doregister');

// login
Route::get('/login','AuthController@login')->name('auth.login');
Route::post('/dologin','AuthController@dologin')->name('auth.dologin');

//-----------------------------------------------------------------------------------------
Route::middleware('userauth')->group(function(){
    //logout
    Route::get('/logout','AuthController@logout')->name('auth.logout');
    Route::get('/notfound','AuthController@notfound')->name('auth.notfound');

    Route::get('lang/{locale}', 'HomeController@lang');
    Route::get('/home','AuthController@home')->name('auth.home');

    // tasks routes
    Route::get('/tasks/index','TaskController@index')->name('tasks.index');

    // admin routes
    Route::middleware('isAdmin')->group(function(){
        Route::get('/makeadmin','AuthController@makeadmin')->name('auth.makeadmin');
        Route::post('/madeadmin','AuthController@madeadmin')->name('auth.madeadmin');
        // tasks
        // create
        Route::get('/tasks/create','TaskController@create')->name('tasks.create');
        Route::post('/tasks/store','TaskController@store')->name('tasks.store');

        // update
        Route::get('/tasks/edit/{id}','TaskController@edit')->name('tasks.edit');
        Route::post('/tasks/update/{id}','TaskController@update')->name('tasks.update');

        // delete
        Route::get('/tasks/destroy/{id}','TaskController@destroy')->name('tasks.destroy');
        // show
        Route::get('/tasks/show/{id}','TaskController@show')->name('tasks.show');
        // end tasks routes
    });
    // user routes
    Route::middleware('isUser')->group(function(){
        Route::get('/tasks/show/{id}','TaskController@show')->name('tasks.show');
    });
});



