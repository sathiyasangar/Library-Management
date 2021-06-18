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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('/home', 'HomeController@index')->name('home');

    //Book  
    Route::get('/book', 'BookController@index')->name('book');
    Route::get('/addbook', 'BookController@create')->name('addbook');
    Route::post('/bookinsert', 'BookController@store')->name('bookinsert');
    Route::get('/bookedit/{id}', 'BookController@edit')->name('bookedit');
    Route::get('/bookdelete/{id}', 'BookController@destroy')->name('languagdelete');
    //Bulk Upload
    Route::get('/bulkupload', 'BookController@bulk')->name('bulkupload');
    Route::post('/bulkinsert', 'BookController@bookdetailupload')->name('bulkinsert');

    //Book Subscribe
    Route::get('/subscribe/{id}', 'BookController@subscribe')->name('subscribe');

    //Language
    Route::get('/language', 'LanguageController@index')->name('language');
    Route::get('/addlanguage', 'LanguageController@create')->name('addlanguage');
    Route::post('/languageinsert', 'LanguageController@store')->name('languageinsert');
    Route::get('/languageedit/{id}', 'LanguageController@edit')->name('languageedit');
    Route::get('/languagdelete/{id}', 'LanguageController@destroy')->name('languagdelete');

    //Subscribe
    Route::get('/subscribe', 'SubsrcibeController@index')->name('subscribe');
    Route::get('/unsubscribe/{id}', 'SubsrcibeController@destroy')->name('unsubscribe');

    //user
    Route::get('/user', 'UserController@index')->name('user');

});