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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/dashboard', 'DashBoardController@index')->name('dashboard');

Route::group(['middleware' => ['auth']], function() {

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
        Route::resource('role', 'RoleController');
        Route::resource('user', 'UserController');
    });

    Route::resource('google2Fa', 'TfaController')->only('show', 'destroy');
    Route::resource('group', 'GroupController');
    Route::resource('group.key', 'KeyController');
    Route::resource('category', 'CategoryController');

});
