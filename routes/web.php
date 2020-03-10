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

Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show','edit', 'update','destroy']]);

Route::resource('comments', 'CommentsController', ['only' => ['store']]);

Route::get('/help', 'HelpController@index');

Route::get('/ranking', 'RankingController@index');

Route::get('/category', 'CategoryController@index');

Route::get('/category/programming', 'category\Category_programmingController@index');
Route::get('/category/design', 'category\Category_designController@index');
Route::get('/category/language', 'category\Category_languageController@index');
Route::get('/category/sports', 'category\Category_sportsController@index');
Route::get('/category/study', 'category\Category_studyController@index');
Route::get('/category/work', 'category\Category_workController@index');
Route::get('/category/health', 'category\Category_healthController@index');
Route::get('/category/finance', 'category\Category_financeController@index');
Route::get('/category/happiness', 'category\Category_happinessController@index');
Route::get('/category/thinking', 'category\Category_thinkingController@index');
Route::get('/category/music', 'category\Category_musicController@index');
Route::get('/category/cooking', 'category\Category_cookingController@index');
Route::get('/category/video', 'category\Category_videoController@index');
Route::get('/category/daily', 'category\Category_dailyController@index');
Route::get('/category/skill', 'category\Category_skillController@index');
Route::get('/category/educate', 'category\Category_educateController@index');

Route::group(['middleware' => 'auth'], function() {
  Route::get('/mypage', 'MypageController@index');
});

Route::resource('images', 'ImagesController', ['only' => ['index', 'create', 'store', 'show', 'destroy']]);

Route::post('/posts/{post}/likes', 'LikesController@store');
Route::post('/posts/{post}/likes/{like}', 'LikesController@destroy');

Route::get('/search', 'SearchController@index');

Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/owner', 'OwnerController@index');
    Route::get('/owner/export{keyword?}', 'OwnerController@export')->name('export.owner');
});
