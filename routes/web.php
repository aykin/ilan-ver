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

Route::get('/ilanlar', 'JobListingController@index')->name('job-listings-index');
Route::get('/ilanlar/ekle', 'JobListingController@add')->name('job-listing-form');
Route::post('/ilanlar', 'JobListingController@store')->name('job-listing-store');;
Route::delete('/job-listings/{job-listing}', 'JobListingController@destroy')->name('job-listing-destroy');;
Auth::routes();

Route::get('/home', 'HomeController@index');
