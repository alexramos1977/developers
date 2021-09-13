<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers', 'as' => 'developer.'], function()
{
    Route::get('developers', 'DeveloperController@index')->name('index');
    Route::get('developers/{id}/edit', 'DeveloperController@edit')->name('edit');
    Route::get('developers/{id}/delete', 'DeveloperController@delete')->name('delete');
    Route::post('developers', 'DeveloperController@store')->name('store');
    Route::put('developers', 'DeveloperController@update')->name('update');
    Route::delete('developers', 'DeveloperController@destroy')->name('destroy');
});
