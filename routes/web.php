<?php

use App\Battle;
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

    $battle = new Battle;
    $battle = $battle->orderByDesc('updated_at')->paginate(10);

    return view('home')
        ->with('battle', $battle);

})->name('homepage');


Route::get('/battle/vote', 'App\BattleController@vote');
Route::resource('battle', 'App\BattleController');


// Route::get('/battle/{id}', 'BattleController@show');
