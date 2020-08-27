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

Route::domain('{username}.'.env('APP_URL'))->group(function () {
    Route::get('/', 'ShowPage@getMyPage')->name('getMyPage');
});

Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['verify' => true]);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/thoughts', 'ThoughtController@index')->name('dashboard');
    Route::post('/thoughts', 'ThoughtController@create')->name('new_thought');
    Route::get('/thoughts/{thought}', 'ThoughtController@edit')->name('get_thought');
    Route::post('/thoughts/{thought}', 'ThoughtController@update')->name('edit_thought');
    Route::delete('thoughts/{thought}', 'ThoughtController@delete')->name('delete_thought');
});
