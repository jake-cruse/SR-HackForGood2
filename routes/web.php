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
Route::get('/chat/', 'ChatsController@showChat')->name('chat');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('/vote/', 'VoteController@showVote')->name('vote');
Route::get('/vote/{topic}', 'VoteController@doVote')->name('vote-for-topic');

Route::get('/help/', 'HelpController@showHelp')->name('help');
Route::get('/game/', 'GameController@showGame')->name('game');
Route::get('/leaders/', 'LeadersController@showLeaders')->name('leaders');