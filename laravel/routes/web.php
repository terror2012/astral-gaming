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

Route::get('/', 'IndexController@index')->name('home');
Route::get('/products/{id}', 'ProductsController@index');
Route::get('/add_review/{id}', 'ReviewController@add');
Route::get('/set_featured/{id}', 'PreOrderController@set_feature');
Route::get('/delete_preorder/{id}', 'PreOrderController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/general_settings', 'GeneralSettingsController@index');
Route::post('/general_settings', 'GeneralSettingsController@postData')->name('general_settings');
Route::get('/popular_products', 'PopularProductsController@index');
Route::get('/featured_products', 'FeaturedProductsController@index')->name('featured');
Route::post('/featured_products', 'FeaturedProductsController@postindex');
Route::get('/featured_products/delete/{id}', 'FeaturedProductsController@delete');
Route::get('/user_logout', function(){Auth::logout(); return redirect()->route('home');});
Route::get('/add_products', 'AddProductsController@index');
Route::post('/add_products', 'AddProductsController@postindex');
Route::get('/manage_products', 'ManageProductsController@index');
Route::get('/edit_product/{id}', 'ManageProductsController@editProduct');
Route::get('/delete_product/{id}', 'ManageProductsController@deleteProduct');
Route::get('/product_visible/{id}', 'ManageProductsController@changeVisible');
Route::get('/category', 'AddCategoryController@index')->name('category');
Route::post('/add_category', 'AddCategoryController@postCategory');
Route::get('/edit_category/{id}', 'AddCategoryController@editindex');
Route::get('/delete_category/{id}', 'AddCategoryController@deleteindex');
Route::get('/change_visibility/{id}', 'AddCategoryController@changeVisibility');
Route::any('/autocomplete/', 'AddCategoryController@autocompleteParent');
Route::get('edit_category/{id}', 'AddCategoryController@editCat');
Route::post('/edit_category_edd/{id}', 'AddCategoryController@editCat_editting');
Route::get('/add_preorder', 'PreOrderController@index');
Route::post('/add_preorder', 'PreOrderController@submit');
Route::get('/manage_preorder', 'PreOrderController@manage');

Route::get('/add_blog_new', 'BlogController@add_new_index');
Route::post('/add_blog_new', 'BlogController@add_news');
Route::get('/add_blog_giveaway', 'BlogController@add_giveaway_index');
Route::post('add_blog_giveaway', 'BlogController@add_giveaway');
Route::post('/giveaway/request', 'BlogController@request_name');
Route::get('/add_blog_announcement', 'BlogController@blog_announcement_index');
Route::post('/add_blog_announcement', 'BlogController@blog_announcement');

Auth::routes();