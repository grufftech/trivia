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

Route::get('/', 'Play@index')->name('index');
Route::get('/play/', 'Play@index')->name('play.index');
Route::get('/play/{id}', 'Play@game')->name('play.joingame');
Route::get('/play/{gameid}/round/{roundid}', 'Play@round')->name('play.round');

Route::get( '/admin/', 'Admin@index' )->name( 'admin.index' );
Route::get('/admin/{id}', 'Admin@showGameAdmin')->name('admin.show');
Route::get('/admin/answer/get/{id}', 'Admin@view')->name('admin.answer.get');
Route::post('/admin/answer/edit/{id}', 'Admin@grade')->name('admin.answer.grade');
Route::get('/admin/grade-round/{id}', 'Admin@showGradeRoundAdmin')->name('admin.grade-round');
Route::get( '/admin/dump', 'Admin@dump' )->name( 'admin.dump' );


Route::get( '/auth0/callback', '\Auth0\Login\Auth0Controller@callback' )->name( 'auth0-callback' );
Route::get( '/login', 'Auth\Auth0IndexController@login' )->name( 'login' );
Route::get( '/logout', 'Auth\Auth0IndexController@logout' )->name( 'logout' )->middleware('auth');

Route::get('/games/', 'Games@index')->name('games.index');
Route::post('/games/', 'Games@create')->name('games.create');
Route::get('/games/{id}', 'Games@show')->name('games.show');
Route::get('/games/edit/{id}', 'Games@edit')->name('games.edit');
Route::post('/games/edit/{id}', 'Games@update')->name('games.update');
Route::get('/games/delete/{id}', 'Games@delete')->name('games.delete');

Route::get('/rounds/', 'Rounds@index')->name('rounds.index');
Route::post('/rounds/', 'Rounds@create')->name('rounds.create');
Route::get('/rounds/{id}', 'Rounds@show')->name('rounds.show');
Route::get('/rounds/edit/{id}', 'Rounds@edit')->name('rounds.edit');
Route::post('/rounds/edit/{id}', 'Rounds@update')->name('rounds.update');
Route::get('/rounds/delete/{id}', 'Rounds@delete')->name('rounds.delete');

Route::get('/questions/', 'Questions@index')->name('questions.index');
Route::post('/questions/', 'Questions@create')->name('questions.create');
Route::get('/questions/{id}', 'Questions@show')->name('questions.show');
Route::get('/questions/edit/{id}', 'Questions@edit')->name('questions.edit');
Route::post('/questions/edit/{id}', 'Questions@update')->name('questions.update');
Route::get('/questions/delete/{id}', 'Questions@delete')->name('questions.delete');

Route::get('/teams/', 'Teams@index')->name('teams.index');
Route::post('/teams/', 'Teams@create')->name('teams.create');
Route::get('/teams/{id}', 'Teams@show')->name('teams.show');
Route::get('/teams/edit/{id}', 'Teams@edit')->name('teams.edit');
Route::post('/teams/edit/{id}', 'Teams@update')->name('teams.update');
Route::get('/teams/delete/{id}', 'Teams@delete')->name('teams.delete');

Route::get('/answers/', 'Answers@index')->name('answers.index');
Route::post('/answers/', 'Answers@create')->name('answers.create');
Route::post('/answers/save/', 'Answers@submitAll')->name('answers.submitall');
Route::get('/answers/{id}', 'Answers@show')->name('answers.show');
Route::get('/answers/edit/{id}', 'Answers@edit')->name('answers.edit');
Route::post('/answers/edit/{id}', 'Answers@update')->name('answers.update');
Route::get('/answers/delete/{id}', 'Answers@delete')->name('answers.delete');
