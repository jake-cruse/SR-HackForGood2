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
    return view('welcome');
});

Auth::routes();

Route::get('/threads/', 'ChatsController@showThreads');
Route::get('/chat/', 'ChatsController@showChat');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('/vote/', 'VoteController@showVote');
Route::get('/vote/{topic}', 'VoteController@doVote')->name('vote-for-topic');
