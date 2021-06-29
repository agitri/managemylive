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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth'])->name('dashboard');

// Ledger
Route::resource('ledger', 'LedgerController');
Route::resource('ledger/item', 'LedgerItemController');

// Diary
Route::resource('diary', 'DiaryController');
Route::resource('diary/entry', 'DiaryEntryController');

require __DIR__.'/auth.php';
