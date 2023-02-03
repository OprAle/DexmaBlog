<?php

use App\Http\Controllers\PostController;
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
})->name('home');

Route::controller(PostController::class)->name('posts.')->group(function () {
    Route::get('posts', 'index')->name('index');
    Route::get('posts/create', 'create')->name('create');
    Route::post('posts', 'store')->name('store');
    Route::get('posts/{post}', 'show')->name('show');
    Route::get('posts/{post}/edit', 'edit')->name('edit');
    Route::put('posts/{post}/update', 'update')->name('update');
    Route::get('posts/{post}/delete', 'destroy')->name('delete');
});
