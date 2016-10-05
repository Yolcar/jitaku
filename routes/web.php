<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::bind('product', function($slug){
  return App\Product::where('slug', $slug)->first();
});

Route::get('/', [
  'as'    => 'home',
  'uses'  => 'HomeController@index'
]);

Route::get('product/{slug}', [
  'as'    => 'product-detail',
  'uses'  => 'ProductController@show'
]);

// Carrito de Compras -----------------------------
Route::get('cart/show', [
  'as'    => 'cart-show',
  'uses'  => 'CartController@show'
]);

Route::get('cart/add/{product}', [
  'as'    => 'cart-add',
  'uses'  => 'CartController@add'
]);

Route::get('cart/delete/{product}', [
  'as'    => 'cart-delete',
  'uses'  => 'CartController@delete'
]);

Route::get('cart/trash', [
  'as'    => 'cart-trash',
  'uses'  => 'CartController@trash'
]);

Route::get('cart/update/{product}/{quantity?}', [
  'as'    => 'cart-update',
  'uses'  => 'CartController@update'
]);

Route::get('order-detail',[
  'as'    => 'order-detail',
  'uses'  => 'CartController@orderDetail'
])->middleware('auth');

Route::get('process-order', [
  'as'    => 'process-order',
  'uses'  => 'CartController@processOrder'
]);
