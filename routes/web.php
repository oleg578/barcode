<?php

use Illuminate\Support\Facades\Route;

/**
 * disable some routes for auth
 */
Auth::routes([
    'register' => false, // Register user
    'reset' => false, // Reset Password
    'verify' => false, // Email Verification

  ]);

Route::get('/', 'HomeController@index')->name('home');

Route::post('/printaction', 'HomeController@printaction')->name('printaction');

/**
 * GET/admin/printers, mapped to the index() method,
 * GET /admin/printers/create, mapped to the create() method,
 * POST /admin/printers, mapped to the store() method,
 * GET /admin/printers/{printer}, mapped to the show() method,
 * GET /admin/printers/{printer}/edit, mapped to the edit() method,
 * PUT/PATCH /admin/printers/{printer}, mapped to the update() method,
 * DELETE /admin/printers/{printer}, mapped to the destroy() method.
 */
//Route::resource('admin/printers', 'PrinterController');
Route::get('/admin/printers', 'PrinterController@index')->name('printerindex');
Route::get('/admin/printers/create', 'PrinterController@create')->name('printercreate');
Route::post('/admin/printers/store', 'PrinterController@store')->name('printerstore');
Route::get('/admin/printers/delete/{id}', 'PrinterController@destroy')->name('printerdelete');
Route::get('/admin/printers/edit/{id}', 'PrinterController@edit')->name('printeredit');
Route::post('/admin/printers/update/{id}', 'PrinterController@update')->name('printerupdate');

/**
 * GET/admin/barcodes, mapped to the index() method,
 * GET /admin/barcodes/create, mapped to the create() method,
 * POST /admin/barcodes, mapped to the store() method,
 * GET /admin/barcodes/{barcode}, mapped to the show() method,
 * GET /admin/barcodes/{barcode}/edit, mapped to the edit() method,
 * PUT/PATCH /admin/barcodes/{barcode}, mapped to the update() method,
 * DELETE /admin/barcodes/{barcode}, mapped to the destroy() method.
 */
//Route::resource('/admin/barcodes', 'BarcodeController');
Route::permanentRedirect('/admin', '/admin/barcodes');


Route::get('/admin/barcodes', 'BarcodeController@index')->name('barcodeindex');
/**
 * report to csv file
 */
Route::get('/admin/barcodes/report', 'BarcodeController@reportcsv')->name('barcodesreportcsv');
Route::post('/admin/barcodes/report', 'BarcodeController@reportcsv')->name('barcodesoutreport');
/**
 * GET/admin/users, mapped to the index() method,
 * GET /admin/users/create, mapped to the create() method,
 * POST /admin/users, mapped to the store() method,
 * GET /admin/users/{user}, mapped to the show() method,
 * GET /admin/users/{user}/edit, mapped to the edit() method,
 * PUT/PATCH /admin/users/{user}, mapped to the update() method,
 * DELETE /admin/users/{user}, mapped to the destroy() method.
 */

//Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
//    Route::resource('users', 'UserController');
//});

Route::get('/admin/users', 'UserController@index')->name('userindex');
Route::get('/admin/users/create', 'UserController@create')->name('usercreate');
Route::post('/admin/users/store', 'UserController@store')->name('userstore');
Route::get('/admin/users/delete/{user}', 'UserController@destroy')->name('userdelete');
Route::get('/admin/users/edit/{id}', 'UserController@edit')->name('useredit');
Route::post('/admin/users/update/{id}', 'UserController@update')->name('userupdate');


//Profile
//Route::get('/admin/profiles', 'ProfileController@index')->name('profileindex');
//Route::get('/admin/profiles/create', 'ProfileController@create')->name('profilecreate');
//Route::post('/admin/profiles/store', 'ProfileController@store')->name('profilestore');
//Route::get('/admin/profiles/delete/{id}', 'ProfileController@destroy')->name('profiledelete');
//Route::get('/admin/profiles/edit/{id}', 'ProfileController@edit')->name('profileedit');
//Route::post('/admin/profiles/update/{id}', 'ProfileController@update')->name('profileupdate');
