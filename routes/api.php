<?php

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

Route::get('/test', function() {
    return response()->json(['message' => 'Test']);
});

Route::post('/getauth', 'UserController@getAuth');

Route::post('/register', 'UserController@register');

Route::post('/addproduct', 'ProductController@addProduct');

Route::get('/gettype', 'ProductController@getType');

Route::get('/getbrand', 'ProductController@getBrand');

Route::get('/getproduct', 'ProductController@getProduct');

Route::get('/getproducts', 'ProductController@getProducts');

Route::get('/getproductsbytype', 'ProductController@getProductsByType');

Route::get('/getuser', 'UserController@getUser');

Route::get('/getuserbyusername', 'UserController@getUserByUsername');

Route::get('/getuserbyemail', 'UserController@getUserByEmail');
