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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/posts', 'HomeController@posts')->name('posts');

Route::get('/home/about/{id}', 'HomeController@about')->name('about');

Route::get('/home/post/{id}', 'HomeController@post')->name('post');

Route::get('/home/press', 'HomeController@press')->name('press');

Route::get('/ministries', 'HomeController@ministries')->name('ministries');

Route::post('/ministries', 'HomeController@join_ministry')->name('ministries.join_ministry');

Route::get('/departments', 'HomeController@departments')->name('departments');

Route::post('/departments/', 'HomeController@join_department')->name('departments.join_department');

Route::get('/services', 'HomeController@services')->name('services');

Route::get('/media/image_library', 'HomeController@image_library')->name('image_library');

Route::get('/media/image_library/{id}/images', 'HomeController@images')->name('images');

Route::get('/media/videos', 'HomeController@videos')->name('videos');

Route::get('/media_library/video/{id}', 'HomeController@video')->name('video');

Route::get('/podcasts', 'HomeController@Podcast')->name('podcasts');

Route::post('/admin/members/import', 'HomeController@import')->name('import');

Route::get('/admin/members/import/ex', 'HomeController@ex')->name('ex');

//Rest API
Route::get('/home/mobile/posts', 'RestController@index');

Route::get('/home/mobile/posts/{id}', 'RestController@post');

Route::get('/home/mobile/press', 'RestController@press');

Route::get('/home/mobile/press/{id}', 'RestController@single_press');

Route::get('/home/mobile/services', 'RestController@services');

Route::get('/home/mobile/services/{id}', 'RestController@service');

Route::get('/home/mobile/search/post/{search_term}', 'RestController@search_post');

Route::get('/home/mobile/search/press/{search_term}', 'RestController@search_press');

Route::get('/home/mobile/search/service/{search_term}', 'RestController@search_service');
