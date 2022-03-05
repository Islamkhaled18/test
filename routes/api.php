<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;


Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('/login', [AuthController::class , 'login'])->name('login');
});


/// categories ///

    Route::get('categories','Api\CategoryController@index');
    Route::get('/categories/{id}','Api\CategoryController@show');
// categories ///
