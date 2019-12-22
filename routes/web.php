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

Route::get('/', 'PostsController@index')->name('top');

Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update','destroy']]);

Route::resource('comments', 'CommentsController', ['only' => ['store']]);

Route::get('/help', 'helpController@index');

Route::get('/ranking', 'rankingController@index');

Route::get('/category', 'categoryController@index');

Route::get('/category/programming', 'category\category_programmingController@index');
Route::get('/category/design', 'category\category_designController@index');
Route::get('/category/language', 'category\category_languageController@index');
Route::get('/category/sports', 'category\category_sportsController@index');
Route::get('/category/study', 'category\category_studyController@index');
Route::get('/category/work', 'category\category_workController@index');
Route::get('/category/health', 'category\category_healthController@index');
Route::get('/category/finance', 'category\category_financeController@index');
Route::get('/category/happiness', 'category\category_happinessController@index');
Route::get('/category/thinking', 'category\category_thinkingController@index');
Route::get('/category/music', 'category\category_musicController@index');
Route::get('/category/cooking', 'category\category_cookingController@index');
Route::get('/category/video', 'category\category_videoController@index');
Route::get('/category/daily', 'category\category_dailyController@index');
Route::get('/category/skill', 'category\category_skillController@index');
Route::get('/category/educate', 'category\category_educateController@index');

Route::group(['middleware' => 'auth'], function() {
  Route::get('/favorite', 'favoriteController@index');
  Route::get('/mypage', 'mypageController@index');
});

Route::resource('images', 'ImagesController', ['only' => ['index', 'create', 'store', 'show', 'destroy']]);

Route::post('/posts/{post}/likes', 'LikesController@store');
  Route::post('/posts/{post}/likes/{like}', 'LikesController@destroy');

Route::get('/search', 'searchController@index');

Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/owner', 'ownerController@index');
    Route::get('/owner/export{keyword?}', 'ownerController@export')->name('export.owner');
});
