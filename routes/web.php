<?php

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

// Index Routes
Route::get('/', 'Front\IndexController@index');

// About Route
Route::get('/about', function () {
    return view('front.about');
});

// Categories Route
Route::get('/categories/{url}', 'Front\CategoryController@category');

// Products Route
Route::get('/product/{url}', 'Front\ProductController@product');

Route::view('/examples/plugin', 'examples.plugin');
Route::view('/examples/blank', 'examples.blank');

// Auth::routes(['register' => false, 'login' => false]);

// Login and register route
Route::get('/login', 'Front\AuthController@login');
Route::post('/login', 'Front\AuthController@postLogin')->name('login');
Route::get('/register', 'Front\AuthController@register');
Route::post('/register', 'Front\AuthController@postRegister')->name('register');

// Route::get('/home', 'HomeController@index')->name('home');

// Blog routes
Route::get('/blog', 'Front\BlogController@index');
Route::get('/blog/{category}', 'Front\BlogController@category');
Route::get('/blog/tag/{tag}', 'Front\BlogController@tag');
Route::get('/blog-detail/{url}', 'Front\BlogController@blogdetail');
Route::post('/blog/comment', 'Front\BlogController@comment')->name('blog.comment');

// Cart routes
Route::get('/cart', 'Front\CartController@cart');
Route::post('/cart/add', 'Front\CartController@add');
Route::get('/cart/delete/{id}', 'Front\CartController@delete');
Route::post('/cart/update', 'Front\CartController@update')->name('cart.update');
Route::get('/cart/header', 'Front\CartController@headerCart');

// Wishlist route
Route::post('/wishlist/add', 'Front\WishlistController@add');

// Subscriber route
Route::post('/subscribe', 'Front\IndexController@subscribe');

// Contact route
Route::get('/contact', 'Front\ContactController@contact');
Route::post('/contact/store', 'Front\ContactController@store')->name('contact.submit');

// Checkout routes
Route::get('/checkout', 'Front\CheckoutController@checkout');
Route::post('/checkout/place', 'Front\CheckoutController@placeOrder')->name('checkout.place');
Route::get('/checkout/success', 'Front\CheckoutController@success');

/////////////////////////////////////////////////////////////////////
// Customer Route Start From Here
/////////////////////////////////////////////////////////////////////

Route::group(['middleware' => 'customer'], function () {
    Route::get('myaccount', 'Front\CustomerController@myaccount');
    Route::put('myaccount/{id}', 'Front\CustomerController@update')->name('myaccount.update');

    Route::get('myaccount/change-password', 'Front\CustomerController@changePassword');
    Route::put('myaccount/change-password/{id}', 'Front\CustomerController@updatePassword')->name('myaccount.update-password');

    Route::get('myaccount/wishlist', 'Front\CustomerController@wishlist');
    Route::get('myaccount/wishlist/{id}/delete', 'Front\CustomerController@wishlistDelete');

    Route::get('myaccount/orders','Front\CustomerController@orders');
    Route::get('myaccount/order/{id}','Front\CustomerController@orderDetail');

    Route::get('myaccount/logout', 'Front\CustomerController@logout');
});

/////////////////////////////////////////////////////////////////////
// Admin Route Start From Here
/////////////////////////////////////////////////////////////////////
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('admin', 'Admin\IndexController@index');
Route::post('admin', 'Admin\IndexController@login');

Route::get('admin/banner/data', 'Admin\BannerController@datatable');
Route::get('admin/category/data', 'Admin\CategoryController@datatable');
Route::get('admin/product/data', 'Admin\ProductController@datatable');
Route::get('admin/blogCategory/data', 'Admin\BlogCategoryController@datatable');
Route::get('admin/blog/data', 'Admin\BlogController@datatable');
Route::get('admin/blog/{id}/commentData', 'Admin\BlogController@commentData');
Route::delete('admin/product/deleteImage/{id}', 'Admin\ProductController@deleteImage');
Route::get('admin/contact/data', 'Admin\ContactController@datatable');
Route::get('admin/subscriber/data', 'Admin\SubscriberController@datatable');
Route::get('admin/order/data', 'Admin\OrderController@datatable');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/dashboard', 'Admin\DashboardController@index');

    Route::resource('admin/banner', 'Admin\BannerController');
    Route::get('admin/banner/{id}/delete', 'Admin\BannerController@destroy');

    Route::resource('admin/category', 'Admin\CategoryController');
    Route::get('admin/category/{id}/delete', 'Admin\CategoryController@destroy');

    Route::resource('admin/product', 'Admin\ProductController');
    Route::get('admin/product/{id}/delete', 'Admin\ProductController@destroy');

    Route::resource('admin/order', 'Admin\OrderController');

    Route::get('admin/settings', 'Admin\SettingsController@index');
    Route::put('admin/settings/update', 'Admin\SettingsController@update');

    Route::resource('admin/blogCategory', 'Admin\BlogCategoryController');
    Route::get('admin/blogCategory/{id}/delete', 'Admin\BlogCategoryController@destroy');

    Route::resource('admin/blog', 'Admin\BlogController');
    Route::get('admin/blog/{id}/delete', 'Admin\BlogController@destroy');

    Route::get('admin/blog/{id}/comment', 'Admin\BlogController@comment');
    Route::get('admin/blog/comment/{id}/delete', 'Admin\BlogController@deleteComment');

    Route::resource('admin/contact', 'Admin\ContactController');
    Route::get('admin/contact/{id}/delete', 'Admin\ContactController@destroy');

    Route::get('admin/subscriber', 'Admin\SubscriberController@index');
    Route::get('admin/subscriber/{id}/delete', 'Admin\SubscriberController@destroy');
});
