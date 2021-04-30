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

Route::get('/', function () {return view('welcome');});
Route::get('/clear', 'BooksController@clear')->name('clear');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('homauth');
Route::get('/lib', 'LibController@index')->name('lib')->middleware('homauth');
Route::get('/books/create', 'BooksController@create')->name('creatBooks')->middleware('mebauth');
Route::get('/books/update', 'BooksController@update')->name('updateBooks')->middleware('mebauth');
Route::get('/complaint/complaintFill', 'BooksController@complaintFill')->name('complaintFill')->middleware('libauth');
Route::get('/books/myBooks', 'BooksController@myBooks')->name('myBooks')->middleware('libauth');
Route::get('/books/waiting', 'BooksController@waiting')->name('waiting')->middleware('libauth');
Route::get('/complaint/complaintShow', 'BooksController@complaintShow')->name('complaintShow')->middleware('mebauth');
Route::get('/users/allmembers', 'BooksController@allmembers')->name('allmembers')->middleware('mebauth');
Route::post('/books/{book}/borrow', 'BooksController@borrow')->name('borrow');
Route::post('/books/{book}/approve', 'BooksController@approve')->name('approve');
Route::post('/books/{book}/noApprove', 'BooksController@noApprove')->name('noApprove');
Route::post('/books/{book}/returnBook', 'BooksController@returnBook')->name('returnBook');
Route::post('/books/{book}/edit', 'BooksController@edit')->name('edit');
Route::post('/books/{id}/delete', 'BooksController@delete')->name('delete');
Route::post('/books', 'BooksController@store')->name('store');
Route::post('/books/{book}/savee', 'BooksController@savee')->name('savee');
Route::post('/complaint', 'BooksController@complaint')->name('complaint');
Route::post('/complaint/{id}/deleteComment', 'BooksController@deleteComment')->name('deleteComment');
Route::post('/users/{id}/addFine', 'BooksController@addFine')->name('addFine');
Route::post('/users/{id}/deletemember', 'BooksController@deletemember')->name('deletemember');
