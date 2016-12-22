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

Auth::routes();

Route::get('/',array('uses' => 'HomeController@homePage'));
Route::get('/getproducts',array('uses' => 'HomeController@getProducts'));
Route::get('/productdetails/{productId}',array('uses' => 'CartController@getProductDetails'));
Route::post('/buyproduct',array('uses' => 'CartController@buyProduct'));

Route::group(['middleware' => 'guest'], function () {
    Route::get('admin', function() { return Redirect::to('/admin/login'); });
    Route::get('admin/login',array('uses' => 'AdminController@getLogin'));
    Route::post('admin/login',array('uses' => 'AdminController@postLogin'));
    
    Route::get('/login',array('uses' => 'HomeController@loginPage'));
    Route::post('/login',array('uses' => 'HomeController@postLogin'));
    Route::get('/signup',array('uses' => 'HomeController@signupPage'));
    Route::post('/signup',array('uses' => 'HomeController@postSignup'));
});

/**
 * Authenticated Routes
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'roles:1'], function () {
       Route::get('admin/dashboard', array('uses' => 'AdminController@getDashboard'));
       Route::get('admin/adduser', array('uses' => 'AdminController@addUser'));
       Route::post('admin/adduser', array('uses' => 'AdminController@addUser'));
       Route::get('admin/edituser/{userId?}', array('uses' => 'AdminController@editUser'));
       Route::post('admin/edituser/{userId?}', array('uses' => 'AdminController@editUser'));
       Route::post('admin/deleteuser', array('uses' => 'AdminController@deleteUser'));
       
       Route::get('admin/listproducts', array('uses' => 'AdminController@listProduct'));
       Route::get('admin/addproduct', array('uses' => 'AdminController@addProduct'));
       Route::post('admin/addproduct', array('uses' => 'AdminController@addProduct'));
       Route::get('admin/editproduct/{productId}', array('uses' => 'AdminController@editProduct'));
       Route::post('admin/editproduct/{productId?}', array('uses' => 'AdminController@editProduct'));
       Route::post('admin/deleteproduct', array('uses' => 'AdminController@deleteProduct'));
       
       Route::post('admin/logout','AdminController@getLogout');
    
    });
    
    Route::group(['middleware' => 'roles:2'], function () {
       Route::get('/viewcart', array('uses' => 'CartController@viewCart'));
       Route::get('/logout',array('uses' => 'HomeController@getLogout'));
       Route::post('/deleteorder','CartController@deleteOrderDetail');
    });
      
});
