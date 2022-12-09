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
Route::get('login', [\App\Http\Controllers\LoginController::class, 'view'])->name('login');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.post');
Route::get('/', [\App\Http\Controllers\Controller::class,'index'])->name('index');
Route::resource('category', \App\Http\Controllers\CategoryController::class)->except(['show']);
Route::resource('news', \App\Http\Controllers\NewsController::class)->scoped([
    'news' => 'title',
]);;
