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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
        Route::resource('role', 'RoleController');
        Route::resource('user', 'UserController');
    });

    Route::resource('google2Fa', '2faController')->only('show', 'destroy');
    Route::resource('group', 'GroupController');
    Route::resource('group.key', 'KeyController');
    Route::resource('category', 'CategoryController');

});
