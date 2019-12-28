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

Route::middleware('auth')
    ->name('account.')
    ->group(function () {
        // Accounts
        Route::resource('accounts', 'AccountController');

        // Account > Movements
        Route::post('/accounts/{account}/movements/import', 'MovementController@import')
            ->name('accounts.movements.import');
        Route::resource('accounts.movements', 'MovementController');

        // Account > Users
        Route::resource('accounts.users', 'UserController');
    });
