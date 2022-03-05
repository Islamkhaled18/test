<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Auth::routes(['register' => false]);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {


        Route::get('/', function () {
            return view('auth.login');
        });

        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['namespace' => 'Dashboard', 'prefix' => 'admin', 'middleware' => 'auth'], function () {

            Route::group(['prefix' => 'categories'], function () {

                Route::get('/', 'CategoryController@index')->name('Categories.index');
                Route::get('create', 'CategoryController@create')->name('Categories.create');
                Route::post('store', 'CategoryController@store')->name('Categories.store');
                Route::get('edit/{id}', 'CategoryController@edit')->name('Categories.edit');
                Route::post('update/{id}', 'CategoryController@update')->name('Categories.update');
                Route::get('delete/{id}', 'CategoryController@destroy')->name('Categories.delete');
            });
        });
    }
);
