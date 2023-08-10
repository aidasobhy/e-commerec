<?php

use Illuminate\Support\Facades\Route;


define('PAGINATION_COUNT', 5);
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
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

        ############################begin categories routes######
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', 'CategoriesController@index')->name('admin.categories');
            Route::get('create', 'CategoriesController@create')->name('admin.categories.create');
            Route::post('store', 'CategoriesController@store')->name('admin.categories.store');
            Route::get('edit/{id}', 'CategoriesController@edit')->name('admin.categories.edit');
            Route::post('update/{id}', 'CategoriesController@update')->name('admin.categories.update');
            Route::get('delete/{id}', 'CategoriesController@delete')->name('admin.categories.delete');

        });
        ############################end categories routes######


        ############################begin brands routes######
        Route::group(['prefix' => 'brands'], function () {
            Route::get('/', 'BrandsController@index')->name('admin.brands');
            Route::get('create', 'BrandsController@create')->name('admin.brands.create');
            Route::post('store', 'BrandsController@store')->name('admin.brands.store');
            Route::get('edit/{id}', 'BrandsController@edit')->name('admin.brands.edit');
            Route::post('update/{id}', 'BrandsController@update')->name('admin.brands.update');
            Route::get('delete/{id}', 'BrandsController@delete')->name('admin.brands.delete');

        });
        ############################end brands routes######

        ############################begin tags routes######
        Route::group(['prefix' => 'tags'], function () {
            Route::get('/', 'TagsController@index')->name('admin.tags');
            Route::get('create', 'TagsController@create')->name('admin.tags.create');
            Route::post('store', 'TagsController@store')->name('admin.tags.store');
            Route::get('edit/{id}', 'TagsController@edit')->name('admin.tags.edit');
            Route::post('update/{id}', 'TagsController@update')->name('admin.tags.update');
            Route::get('delete/{id}', 'TagsController@delete')->name('admin.tags.delete');

        });
        ############################end tags routes######


        ############################begin products routes######
        Route::group(['prefix' => 'products'], function () {
            Route::get('/', 'ProductsController@index')->name('admin.products');
            Route::get('general-information', 'ProductsController@create')->name('admin.general.products.create');
            Route::post('store-general-information', 'ProductsController@store')->name('admin.general.products.store');

            Route::get('price/{product_id}', 'ProductsController@getPrice')->name('admin.products.price.create');
            Route::post('price', 'ProductsController@saveProductPrice')->name('admin.products.price.store');

            Route::get('stock/{product_id}', 'ProductsController@getStock')->name('admin.products.stock.create');
            Route::post('stock', 'ProductsController@saveProductStock')->name('admin.products.stock.store');

            Route::get('images/{product_id}', 'ProductsController@addImages')->name('admin.products.images.create');
            Route::post('store-images-in-folder', 'ProductsController@saveProductImages')->name('admin.products.images.store');
            Route::post('store-images-in-database', 'ProductsController@saveProductImagesDB')->name('admin.products.images.store.db');

            ##################attribute product##################
             Route::group(['prefix' => 'attributes'], function () {
                Route::get('/', 'AttributesController@index')->name('admin.attributes');
                Route::get('create', 'AttributesController@create')->name('admin.attributes.create');
                Route::post('store', 'AttributesController@store')->name('admin.attributes.store');
                Route::get('edit/{id}', 'AttributesController@edit')->name('admin.attributes.edit');
                Route::post('update/{id}', 'AttributesController@update')->name('admin.attributes.update');
                Route::get('delete/{id}', 'AttributesController@delete')->name('admin.attributes.delete');
                ##################attribute product##################
            });

            ##################attribute product##################
            Route::group(['prefix' => 'options'], function () {
                Route::get('/', 'OptionsController@index')->name('admin.options');
                Route::get('create', 'OptionsController@create')->name('admin.options.create');
                Route::post('store', 'OptionsController@store')->name('admin.options.store');
                Route::get('edit/{id}', 'OptionsController@edit')->name('admin.options.edit');
                Route::post('update/{id}', 'OptionsController@update')->name('admin.options.update');
                Route::get('delete/{id}', 'OptionsController@delete')->name('admin.options.delete');
                ##################attribute product##################
            });


        });
        ############################end products routes######


    });


    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {
        Route::get('login', 'LoginController@login')->name('admin.login');
        Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
    });
});






