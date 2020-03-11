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

Route::get('/category/programming', 'Category\Category_programmingController@index');
Route::get('/category/design', 'Category\Category_designController@index');
Route::get('/category/language', 'Category\Category_languageController@index');
Route::get('/category/sports', 'Category\Category_sportsController@index');
Route::get('/category/study', 'Category\Category_studyController@index');
Route::get('/category/work', 'category\Category_workController@index');
Route::get('/category/health', 'Category\Category_healthController@index');
Route::get('/category/finance', 'Category\Category_financeController@index');
Route::get('/category/happiness', 'Category\Category_happinessController@index');
Route::get('/category/thinking', 'Category\Category_thinkingController@index');
Route::get('/category/music', 'Category\Category_musicController@index');
Route::get('/category/cooking', 'Category\Category_cookingController@index');
Route::get('/category/video', 'Category\Category_videoController@index');
Route::get('/category/daily', 'Category\Category_dailyController@index');
Route::get('/category/skill', 'Category\Category_skillController@index');
Route::get('/category/educate', 'Category\Category_educateController@index');

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
