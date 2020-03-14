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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/', 'ProductsController@index')->name('products');
Route::get('/settings', 'ProductsController@settings')->name('settings');
Route::post('/settings', 'ProductsController@update')->name('settings.update');
Route::post('/category/edit/{id}', 'ProductsController@catUpdate')->name('category.update');
Route::post('/category/add', 'ProductsController@categoryAdd')->name('category.add');
Route::post('/category/delete', 'ProductsController@categoryDestroy')->name('category.delete');
Route::post('/product/edit/{id}', 'ProductsController@productUpdate')->name('product.update');
Route::post('/product/add', 'ProductsController@store')->name('products.store');
Route::post('/product/delete', 'ProductsController@productDestroy')->name('product.delete');

