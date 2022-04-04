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


Auth::routes(['register' => false]);

// prefisso url es. /admin o admin/posts
//prefisso nome es. admin.home
//prefisso namespace es. Admin\HomeController@index
Route::middleware('auth')->prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/tags/{tag}/posts', 'PostController@tagPosts')->name('tags.posts');

    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::get('/{any}', function () {
        abort(404);
    })->where('any', '.*');
});


Route::namespace('Api')->group(function () {
    Route::resource('posts', 'PostController');
    return view('guest.home');
});


Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
