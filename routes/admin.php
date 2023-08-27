<?php

use Illuminate\Support\Facades\Route;


//define('PAGINATION_COUNT', 5);
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
        Route::group(['prefix' => 'settings','middleware'=>'can:settings'], function () {
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
        Route::group(['prefix' => 'categories','middleware'=>'can:categories'], function () {
            Route::get('/', 'CategoriesController@index')->name('admin.categories');
            Route::get('create', 'CategoriesController@create')->name('admin.categories.create');
            Route::post('store', 'CategoriesController@store')->name('admin.categories.store');
            Route::get('edit/{id}', 'CategoriesController@edit')->name('admin.categories.edit');
            Route::post('update/{id}', 'CategoriesController@update')->name('admin.categories.update');
            Route::get('delete/{id}', 'CategoriesController@delete')->name('admin.categories.delete');

        });
        ############################end categories routes######


        ############################begin brands routes######
        Route::group(['prefix' => 'brands','middleware'=>'can:brands'], function () {
            Route::get('/', 'BrandsController@index')->name('admin.brands');
            Route::get('create', 'BrandsController@create')->name('admin.brands.create');
            Route::post('store', 'BrandsController@store')->name('admin.brands.store');
            Route::get('edit/{id}', 'BrandsController@edit')->name('admin.brands.edit');
            Route::post('update/{id}', 'BrandsController@update')->name('admin.brands.update');
            Route::get('delete/{id}', 'BrandsController@delete')->name('admin.brands.delete');

        });
        ############################end brands routes######

        ############################begin tags routes######
        Route::group(['prefix' => 'tags','middleware'=>'can:tags'], function () {
            Route::get('/', 'TagsController@index')->name('admin.tags');
            Route::get('create', 'TagsController@create')->name('admin.tags.create');
            Route::post('store', 'TagsController@store')->name('admin.tags.store');
            Route::get('edit/{id}', 'TagsController@edit')->name('admin.tags.edit');
            Route::post('update/{id}', 'TagsController@update')->name('admin.tags.update');
            Route::get('delete/{id}', 'TagsController@delete')->name('admin.tags.delete');

        });
        ############################end tags routes######


        ############################begin products routes######
        Route::group(['prefix' => 'products','middleware'=>'can:products'], function () {
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
            Route::group(['prefix' => 'attributes','middleware'=>'can:attributes'], function () {
                Route::get('/', 'AttributesController@index')->name('admin.attributes');
                Route::get('create', 'AttributesController@create')->name('admin.attributes.create');
                Route::post('store', 'AttributesController@store')->name('admin.attributes.store');
                Route::get('edit/{id}', 'AttributesController@edit')->name('admin.attributes.edit');
                Route::post('update/{id}', 'AttributesController@update')->name('admin.attributes.update');
                Route::get('delete/{id}', 'AttributesController@delete')->name('admin.attributes.delete');
                ##################attribute product##################
            });

            ##################attribute product##################
            Route::group(['prefix' => 'options','middleware'=>'can:options'], function () {
                Route::get('/', 'OptionsController@index')->name('admin.options');
                Route::get('create', 'OptionsController@create')->name('admin.options.create');
                Route::post('store', 'OptionsController@store')->name('admin.options.store');
                Route::get('edit/{id}', 'OptionsController@edit')->name('admin.options.edit');
                Route::post('update/{id}', 'OptionsController@update')->name('admin.options.update');
                Route::get('delete/{id}', 'OptionsController@delete')->name('admin.options.delete');
                ##################attribute product##################
            });
            #################slider routes###########
            Route::group(['prefix' => 'sliders','middleware'=>'can:sliders'], function () {
                Route::get('/', 'SlidersController@addSlider')->name('admin.sliders.create');
                Route::post('images', 'SlidersController@saveProductSlider')->name('admin.sliders.store');
                Route::post('images/db', 'SlidersController@saveProductSlideDB')->name('admin.sliders.store.db');
            });
            #####################end slider routes

            #################role routes###########
            Route::group(['prefix' => 'roles','middleware'=>'can:roles'], function () {
                Route::get('/', 'RolesController@index')->name('admin.roles.index');
                Route::get('create', 'RolesController@create')->name('admin.roles.create');
                Route::post('store', 'RolesController@saveRole')->name('admin.roles.store');
                Route::get('/edit/{id}', 'RolesController@edit')->name('admin.roles.edit');
                Route::post('update/{id}', 'RolesController@update')->name('admin.roles.update');
            });
            #####################end role routes


            #################role routes###########
            Route::group(['prefix' => 'users','middleware'=>'can:users'], function () {
                Route::get('/', 'UsersController@index')->name('admin.users.index');
                Route::get('/create', 'UsersController@create')->name('admin.users.create');
                Route::post('/store', 'UsersController@store')->name('admin.users.store');
            });
            #####################end role routes




        });
        ############################end products routes######


    });


    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {
        Route::get('login', 'LoginController@login')->name('admin.login');
        Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
    });
});






