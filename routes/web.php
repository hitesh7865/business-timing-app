<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\BusinessController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix'     => 'business',
    'as'         => 'business.',
], function () {
    Route::controller(BusinessController::class)->group(function () {
        Route::get('index',  'index')->name('index');
        Route::get('create',  'create')->name('create');
        Route::post('store',  'store')->name('store');
        Route::get('edit/{id}',  'edit')->name('edit');
        Route::post('update/{id}',  'update')->name('update');
        Route::delete('destroy',  'destroy')->name('destroy');
    });
});

Route::group([
    'prefix'     => 'branch',
    'as'         => 'branch.',
], function () {
    Route::controller(BranchController::class)->group(function () {
        Route::get('index',  'index')->name('index');
        Route::get('create',  'create')->name('create');
        Route::post('store',  'store')->name('store');
        Route::get('edit/{id}',  'edit')->name('edit');
        Route::post('update/{id}',  'update')->name('update');
        Route::delete('destroy',  'destroy')->name('destroy');
    });
});
