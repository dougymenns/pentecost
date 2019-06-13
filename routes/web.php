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
    return redirect('/home');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/posts', 'HomeController@posts')->name('posts');

Route::get('/home/about/{id}', 'HomeController@about')->name('about');

Route::get('/home/post/{id}', 'HomeController@post')->name('post');

Route::get('/ministries/{id}', 'HomeController@ministries')->name('ministries');

Route::get('/departments/{id}', 'HomeController@departments')->name('departments');

Route::get('/media_library/images', 'HomeController@images')->name('images');

Route::get('/media_library/videos', 'HomeController@videos')->name('videos');

Route::get('/media_library/video/{id}', 'HomeController@video')->name('video');

Route::get('/podcasts', 'HomeController@Podcast')->name('podcasts');

Route::post('/admin/members/import', 'HomeController@import')->name('import');

Route::get('/admin/members/import/ex', 'HomeController@ex')->name('ex');

//Rest API
Route::get('/home/mobile', 'RestController@index');
