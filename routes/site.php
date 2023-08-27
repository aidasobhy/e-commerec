<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

        Route::group(['namespace'=>'Site'/*, 'middleware' => 'guest'*/],function (){
            Route::get('/','HomeSiteController@home')->name('home')->middleware('verifiedUser');
            Route::get('category/{slug}','CategoryController@productBySlug')->name('category');
            Route::get('product/{slug}','ProductController@productBySlug')->name('product.details');


            Route::group(['prefix'=>'cart'],function (){
                Route::get('/','CartController@getIndex')->name('site.cart.index');
                Route::post('/add/{slug?}','CartController@postAdd')->name('site.cart.add');
                Route::post('/update/{slug}','CartController@postUpdate')->name('site.cart.update');
                Route::post('/update-all','CartController@postUpdateAll')->name('site.cart.update-all');

            });
        });

    Route::group(['namespace' => 'Site', ['middleware' => 'auth:web','verifiedUser']], function () {
       //must be authenticated user and verified
         Route::get('profile',function (){
             return 'You Are Authenticated';
         });
    });

    Route::group(['namespace' => 'Site', 'middleware' => 'auth:web'],function (){
        //must be authenticated user
        Route::post('verify-user','VerificationCodeController@verify')->name('verify-user');
        Route::get('verify','VerificationCodeController@showVerifyForm')->name('verify-form');
        Route::get('payment/{amount}','PaymentController@getPayments')->name('payment');
        Route::post('payment','PaymentController@processPayment')->name('payment.process');

    });




});

Route::group(['namespace' => 'Site', 'middleware' => 'auth'],function (){
    //must be authenticated user
    Route::post('wishlist','WishlistController@store')->name('wishlist.store');
    Route::delete('wishlist','WishlistController@destroy')->name('wishlist.destroy');
    Route::get('wishlist/products','WishlistController@index')->name('wishlist.products.index');

});
