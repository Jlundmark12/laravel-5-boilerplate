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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('categories', 'Api\CategoriesController');
//Route::get('/categories', 'Api\CategoriesController');
Route::get('conditions', 'Api\ConditionController@index');
Route::apiResources(['products' => 'Api\NewProductsController']);
Route::apiResources(['kurt_update' => 'Api\KurtController']);
//Route::apiResources(['sub_categories' => 'Api\SubCategoriesController']);
Route::get('horders', 'Api\InvoicingController@index');

Route::post('sub_categories', 'Api\SubCategoriesController@index');
Route::post('sub_categories', 'Api\SubCategoriesController@index');
Route::post('color_options', 'Api\ColorOptionController@index');
Route::post('size_options', 'Api\SizeOptionController@index');



Route::get('sales', 'Api\OrdersUsController@index');
Route::get('calendar', 'Api\CalendarController@index');