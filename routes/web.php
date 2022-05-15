<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Store
Route::get('/', 'HomeController@index')->name('home');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-details');
Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');
Route::get('/details/{id?}', 'DetailController@index')->name('detail');
Route::get('/profile', 'StoreProfileController@index')->name('profile');


Route::group(['middleware' => ['auth', 'customer']], function () {
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@destroy')->name('cart-delete');

    Route::get('/transactions', 'TransactionController@index')->name('transactions');
    Route::get('/transactions/{id}', 'TransactionController@details')->name('transactions-details');

    Route::post('/success', 'CheckoutController@success')->name('success');
    Route::post('/checkout', 'CheckoutController@process')->name('checkout');

    Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');
    Route::post('/details/{id?}', 'DetailController@add')->name('detail-add');
    //Account
    Route::get('/account', 'AccountController@account')->name('account');
    Route::post('/account/{redirect}', 'AccountController@update')->name('account-redirect');
});

Route::prefix('admin')
    ->namespace('Admin') //namespace App\Http\Controllers\Admin;
    ->middleware(['auth', 'admin'])
    ->group(function () {
        // Dashboard
        Route::get('/', 'DashboardController@index')->name('dashboard');

        //Account
        Route::get('/account', 'AccountController@account')->name('account-admin');
        Route::post('/account/{redirect}', 'AccountController@update')->name('account-redirect-admin');

        // Transaction
        Route::resource('transaction', 'TransactionController');

        // Category
        Route::resource('category', 'CategoryController');

        // Product
        Route::resource('product', 'ProductController');

        // ProductGallery
        Route::resource('product-gallery', 'ProductGalleryController');
    });

Route::prefix('owner')
    ->namespace('Owner')
    ->middleware(['auth', 'owner'])
    ->group(function () {
        // Dashboard
        Route::get('/', 'DashboardController@index')->name('dashboard-owner');

        // User
        Route::resource('user', 'UserController');

        // Store
        Route::resource('store', 'StoreController');

        //Acoount
        Route::get('/account', 'AccountController@account')->name('account-owner');
        Route::post('/account/{redirect}', 'AccountController@update')->name('account-redirect-owner');

        // Transaction
        Route::get('/transaction', 'TransactionController@index')->name('transaction');
        Route::get('/transaction/print_pdf', 'TransactionController@print_pdf')->name('print-pdf');
    });


Auth::routes();


Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
