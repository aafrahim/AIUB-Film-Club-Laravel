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

//log
Route::get('/', 'HomeController@loggedout')->name('home.loggedout');
Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LogoutController@index')->name('logout.index');

Route::group(['middleware'=>['sess']], function(){
	//home
Route::get('/home', 'HomeController@index')->name('home.index');

//user
Route::get('/profile/{id}', 'UserController@profileDetails')->name('user.profileDetails');
Route::get('/profile/edit/{id}', 'UserController@profileEdit')->name('user.profileEdit');
Route::post('/profile/edit/{id}', 'UserController@profileUpdate');

Route::get('/committeelist', 'UserController@committeelist')->name('user.committeelist');
Route::get('/userinfo/{id}', 'UserController@userinfo')->name('user.userinfo');
Route::get('/generalMemberlist', 'UserController@generalMemberlist')->name('user.generalMemberlist');
Route::get('/generalMemberlist/gmaction', 'UserController@gmaction')->name('user.gmaction');

//post
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/create', 'PostController@store');
Route::get('/post/main', 'PostController@main')->name('post.main');
Route::get('/post/personal/{id}', 'PostController@personal')->name('post.personal')
;
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('/post/edit/{id}', 'PostController@update');
Route::get('/post/delete/{id}', 'PostController@delete')->name('post.delete');
Route::post('/post/main/{id}', 'PostController@commentStore');

//event
Route::get('/event', 'EventController@index')->name('event.index');
Route::post('/event/{id}', 'EventController@commentStore');
Route::get('/event/details/{id}', 'EventController@details')->name('event.details');

//notice
Route::get('/notice', 'NoticeController@index')->name('notice.index');
Route::post('/notice/{id}', 'NoticeController@commentStore');
Route::get('/notice/details/{id}', 'NoticeController@details')->name('notice.details');

//Gallery
Route::get('/gallery/album/create', 'GalleryController@create')->name('gallery.create');
Route::post('/gallery/album/create', 'GalleryController@store');
Route::get('/galary/albumlist', 'GalleryController@albumlist')->name('gallery.albumlist');
Route::get('/galary/albumaction', 'GalleryController@albumaction')->name('gallery.albumaction');
Route::get('/gallery/album/{title}', 'GalleryController@show')->name('gallery.show');
Route::post('/gallery/album/{title}', 'GalleryController@update');
Route::get('/gallery/album/imageDelete/{id}', 'GalleryController@imageDelete')->name('gallery.imageDelete');
Route::get('/gallery/albumDelete/{id}', 'GalleryController@albumDelete')->name('gallery.albumDelete');

//post comment
Route::get('/postcomment/{id}', 'PostcommentController@index')->name('postcomment.index');
Route::get('post/comment/delete/{id}', 'PostcommentController@delete')->name('postcomment.delete');

//event comment
Route::get('/eventcomment/{id}', 'EventcommentController@index')->name('eventcomment.index');
Route::get('event/comment/delete/{id}', 'EventcommentController@delete')->name('eventcomment.delete');

//notice comment
Route::get('/noticecomment/{id}', 'NoticecommentController@index')->name('noticecomment.index');
Route::get('notice/comment/delete/{id}', 'NoticecommentController@delete')->name('noticecomment.delete');

//test
Route::get('/test', 'TestController@index')->name('test.index');
});