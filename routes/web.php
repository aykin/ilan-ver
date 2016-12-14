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

Auth::routes();

Route::get('/ilanlar', 'JobListingController@index')->name('job-listings-index');
Route::get('/ilanlar/ekle', 'JobListingController@add')->name('job-listing-add-form');
Route::post('/ilanlar/ekle', 'JobListingController@store')->name('job-listing-add-store');
Route::get('/ilan/{jobListingId}', 'JobListingController@view')->name('job-listing-view');
Route::get('/ilan/{jobListingId}/duzenle', 'JobListingController@edit')->name('job-listing-edit-form')->middleware('auth');
Route::patch('/ilan/{jobListingId}/duzenle', 'JobListingController@store')->name('job-listing-edit-store')->middleware('auth');
Route::delete('/ilan/{jobListing}', 'JobListingController@destroy')->name('job-listing-destroy')->middleware('auth');


Route::get('/admin', 'AdminController@index')->middleware('auth');
