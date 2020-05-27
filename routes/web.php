<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movie/{id}', 'MoviesController@show')->name('movies.show');

Route::get('/actors', 'ActorsController@index')->name('actors.index');
Route::get('/actor/{id}', 'ActorsController@show')->name('actors.show');

Route::get('/shows', 'TvController@index')->name('shows.index');
Route::get('/show/{id}', 'TvController@show')->name('shows.show');

// Pagination route
Route::get('/actors/page/{page?}', 'ActorsController@index');