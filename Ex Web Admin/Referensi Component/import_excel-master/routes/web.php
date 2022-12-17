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

// ======================== import ======================== //
Route::get('/import_excel', 'ImportExcelController@index')->name('import_excel');
Route::post('/import_excel/import', 'ImportExcelController@import');

// ------------------------ delete ------------------------- //
Route::get('import_excel/{importID}','ImportExcelController@importDelete')->name('importDelete');
// ------------------------ insert ------------------------ //
Route::post('importInsert','ImportExcelController@importInsert')->name('importInsert');
// ------------------------ update ------------------------ //

Route::post('importUpdate','ImportExcelController@importUpdate')->name('importUpdate');

