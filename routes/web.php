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

Route::controller(PostController::class)->group(function () {
    Route::get('posts', 'index')->name('posts');
    Route::get('posts/create', 'create')->name('posts.create');
    Route::post('posts', 'store')->name('posts.store');
    Route::get('posts/{post}', 'show')->name('posts.show');
    Route::get('posts/{post}/edit', 'edit')->name('posts.edit');
    Route::put('posts/{post}/update', 'update')->name('posts.update');
    Route::get('posts/{post}/delete', 'destroy')->name('posts.delete');
});
