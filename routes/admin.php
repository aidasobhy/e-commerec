<?php

use Illuminate\Support\Facades\Route;


define('PAGINATION_COUNT',10);
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin','prefix'=>'admin'], function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::get('logout', 'LogoutController@logout')->name('admin.logout');
        #####################begin setting shippings routes##############
        Route::group(['prefix' => 'settings'], function () {
            Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethod')->name('edit.shipping.method');
            Route::put('shipping-methods/{id}', 'SettingsController@updateShippingMethod')->name('update.shipping.method');
        });
        ######################end settings shippings routes##############

        #########################begin settings profile routes #######
        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
            Route::put('update', 'ProfileController@updateProfile')->name('update.profile');
        });
        #########################end settings profile routes#########

        ############################begin main-categories routes######
        Route::group(['prefix' => 'main-categories'], function () {
            Route::get('/', 'MainCategoriesController@index')->name('admin.mainCategories');
            Route::get('create', 'MainCategoriesController@create')->name('admin.mainCategories.create');
            Route::post('store', 'MainCategoriesController@store')->name('admin.mainCategories.store');
            Route::get('edit/{id}', 'MainCategoriesController@edit')->name('admin.mainCategories.edit');
            Route::post('update/{id}', 'MainCategoriesController@update')->name('admin.mainCategories.update');
            Route::get('delete/{id}', 'MainCategoriesController@delete')->name('admin.mainCategories.delete');

        });
        ############################end main-categories routes######


        ############################begin sub-categories routes######
        Route::group(['prefix' => 'sub-categories'], function () {
            Route::get('/', 'SubCategoriesController@index')->name('admin.subCategories');
            Route::get('create', 'SubCategoriesController@create')->name('admin.subCategories.create');
            Route::post('store', 'SubCategoriesController@store')->name('admin.subCategories.store');
            Route::get('edit/{id}', 'SubCategoriesController@edit')->name('admin.subCategories.edit');
            Route::post('update/{id}', 'SubCategoriesController@update')->name('admin.subCategories.update');
            Route::get('delete/{id}', 'SubCategoriesController@delete')->name('admin.subCategories.delete');

        });
        ############################end sub-categories routes######

        ############################begin brands routes######
        Route::group(['prefix' => 'brands'], function () {
            Route::get('/', 'BrandsController@index')->name('admin.brands');
            Route::get('create', 'BrandsController@create')->name('admin.brands.create');
            Route::post('store', 'BrandsController@store')->name('admin.brands.store');
            Route::get('edit/{id}', 'BrandsController@edit')->name('admin.brands.edit');
            Route::post('update/{id}', 'BrandsController@update')->name('admin.brands.update');
            Route::get('delete/{id}', 'BrandsController@delete')->name('admin.brands.delete');

        });
        ############################end sub-categories routes######
    });



    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin','prefix'=>'admin'], function () {
        Route::get('login', 'LoginController@login')->name('admin.login');
        Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
    });
});






