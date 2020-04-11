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
//Frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');

//backend
Route::get('/admin', 'AdminController@index');
Route::get('/admin-dashboard', 'AdminController@show_dashboard');
Route::get('/logout', 'AdminController@admin_logout');
Route::post('/admin_dashboard', 'AdminController@dashboard');

//Category Product
Route::get('/add-category-product', 'CategoryProductController@add_category_product');
Route::get('/all-category-product', 'CategoryProductController@all_category_product');

Route::get('/active-category-product/{category_product_id}', 'CategoryProductController@active_category_product');
Route::get('/unactive-category-product/{category_product_id}', 'CategoryProductController@unactive_category_product');

Route::post('/save-category-product', 'CategoryProductController@save_category_product');
