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

Route::controller(PostController::class)->name('posts.')->prefix('posts')->group(function () {
    /**
     * Display a listing of the resource.
     */
    Route::get('/', 'index')->name('index');

    /**
     * Show the form for creating a new resource.
     */
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');

    /**
     * Display the specified resource.
     */
    Route::get('/{post}', 'show')->name('show');

    /**
     * Show the form for editing the specified resource.
     */
    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::put('/{post}/update', 'update')->name('update');

    /**
     * Remove the specified resource from storage.
     */
    Route::get('/{post}/delete', 'destroy')->name('delete');
});
