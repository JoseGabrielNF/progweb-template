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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 
Route::get('/explorer', 'ExplorerController@index')->name('explorer')->middleware('auth');
Route::get('/account/{username}/album/{id}', 'ProfileController@album_perfil')->middleware('auth');
Route::get('/my-account/settings', 'ProfileController@settings')->middleware('auth');
Route::get('/album/{id}', 'AlbumController@show');
Route::get('/image/{id}', 'ImageController@show');

Route::get('/my-account', 'ProfileController@index')->name('account.index')->middleware('auth');
Route::get('/account/{username}', 'ProfileController@show')->name('account.show');

Route::get('/my-account/settings', 'ProfileController@settings')->name('account.settings')->middleware('auth');

Route::get('/albums', 'AlbumController@index')->middleware('auth'); 
Route::get('/account/{username}/albums', 'ProfileController@list_albums');

Route::get('/followers', 'FollowersController@index_followers')->name('followers.index_followers')->middleware('auth');
Route::get('/following', 'FollowersController@index_following')->name('followers.index_following')->middleware('auth');
Route::get('/account/{username}/followers', 'FollowersController@show_followers')->name('followers.show_followers');
Route::get('/account/{username}/following', 'FollowersController@show_following')->name('followers.show_following');

Route::post('/follow', 'ProfileController@follow')->middleware('auth');
Route::post('/edit-profile-images', 'ProfileController@edit_profile_images')->middleware('auth');
Route::post('/create-album', 'AlbumController@create_album')->middleware('auth');
Route::post('/add-image', 'AlbumController@add_image')->middleware('auth');
Route::post('/like', 'ImageController@curtida')->middleware('auth'); 
Route::post('/delete_image', 'ImageController@delete');
Route::post('/delete_album', 'AlbumController@delete');
Route::post('/my-account/edit-name', 'ProfileController@edit_name')->middleware('auth'); 
Route::post('/my-account/edit-username', 'ProfileController@edit_username')->middleware('auth'); 
Route::post('/my-account/delete-profile', 'ProfileController@delete_profile')->middleware('auth'); 
Route::post('/passa_foto', 'ImageController@passar')->middleware('auth'); 
Route::post('/volta_foto', 'ImageController@voltar')->middleware('auth'); 