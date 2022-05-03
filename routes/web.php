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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/manager', 'ManagerController@index')->name('manager')->middleware('manager');
Route::get('/user', 'UserController@index')->name('user')->middleware('user');
//admin crud



Route::get('/books', 'LivreController@index')->name('books');

Route::get('/books/{id}', 'LivreController@bookdetails')->name('bookdetails');

Route::get('/categories/{id}', 'LivreController@viewByCategory')->name('voirparcategorie');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


 Route::group(['prefix' => 'Admin'], function() {
            Route::get('/', 'AdminController@index')->name('posts.index');
            Route::get('/create', 'AdminController@create')->name('posts.create');
            Route::post('/create', 'AdminController@store')->name('posts.store');
            Route::get('/{post}/show', 'AdminController@show')->name('posts.show');
            Route::get('/{post}/edit', 'AdminController@edit')->name('posts.edit');
            Route::patch('/{post}/update', 'AdminController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
        });