<?php

use Illuminate\Routing\Router as Route;

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

Route::get('/drinks', 'DrinkController@listDrinks')
    ->name('drink.list');

Route::post('/drinks/add', 'DrinkController@postAddDrink')
    ->name('drink.add');

Route::get('drinks/add', 'DrinkController@showAddDrink')
    ->name('drink.add.show');

Route::post('drinks/remove', 'DrinkController@postRemoveDrink')
    ->name('drink.remove');
