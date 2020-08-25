<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'API'], function(){
  Route::resource('categories', 'CategoryController')->only('index', 'show');
  Route::resource('categories', 'CategoryController')->except('index', 'show');

  Route::resource('products', 'ProductController')->only('index');
  Route::resource('products', 'ProductController')->except('index');
});

Route::group(['prefix' => 'users', 'namespace' => 'API\Auth'], function(){
  Route::post('/register', 'RegisterController@register');
  Route::post('/login', 'LoginController@login');
  Route::post('/logout', 'LogoutController@logout')->middleware('auth:api');
});