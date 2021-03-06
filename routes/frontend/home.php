<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\RdnController;
use App\Http\Controllers\Frontend\AproductsController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\LaravelGoogleGraphController;
use App\Http\Controllers\Frontend\InventoryUpdateController;
use App\Http\Controllers\Api\OrdersUsController;
use App\Http\Controllers\Api\CalendarController;
use App\Http\Controllers\Frontend\ChartController;
use App\Http\Controllers\Frontend\ShippingTableController;
use App\Http\Controllers\Frontend\InvoicingController;
/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('charting', [LaravelGoogleGraphController::class, 'index'])->name('charting');


Route::get('/charts', [ChartController::class, 'index'])->name('charts');

Route::get('/pie', [ChartController::class, 'pie'])->name('pie');
Route::get('/cog', [ChartController::class, 'eight'])->name('cogs');
Route::get('/shipping_data', [ShippingTableController::class, 'index'])->name('shipping_data');
Route::get('testing', [CalendarController::class, 'index'])->name('test');
Route::get('raw_testing', [OrdersUsController::class, 'index'])->name('test');
Route::get('/inventory_updates', [InventoryUpdateController::class, 'index'])->name('inventory_updates');
//Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);
Route::get('rdn', [AproductsController::class, 'rdn'])->name('rdn');
/*Route::get('/rdn/{aproduct}', [AproductsController::class, 'show'])->name('rdn');
*/
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
//Route::get('invoicing','InvoicingController@index');
Route::get('invoicing', [InvoicingController::class, 'index'])->name('invoicing');;
Route::get('invoicing/download','InvoicingController@export');
Route::get('invoicing/download/unsubmitted','InvoicingController@unsubmitted');
Route::get('invoicing/download/submitted','InvoicingController@submitted');
/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', [AccountController::class, 'index'])->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
