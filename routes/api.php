<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        Route::group(['namespace' => 'API'], function(){
            Route::apiResource('customers', 'CustomerController');
            // Route::apiResource('comments/user/{user}', 'Comments\UserCommentController');
            Route::group(['prefix' => 'customers'], function(){
                Route::get('/{id}/orders', [
                    'uses'  => 'CustomerController@orders',
                    'as'    => 'customers.orders',
                ]);
            });
        
            Route::post('/{customer_id}/orders/{order_id}', [
                'uses'  => 'CustomerController@order',
                'as'    => 'order.details'
            ]);
        
            Route::post('/{id}/orders', [
                'uses'  => 'CustomerController@order',
                'as'    => 'customer.orders'
            ]);
        
            Route::apiResource('inventories', 'InventoryController');
            Route::apiResource('orders', 'OrderController');
        });
       
    });

});