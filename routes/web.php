<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
    Log::debug('Hello World');
    return view('welcome');
})->name('home');



Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::latest()->with(['category', 'user'])->get()]);
})->name('posts');

Route::get('/posts/create', function () {
    return view('posts.create', [
        'categories' => Category::all(),
        'users' => User::all(),
    ]);
})->name('posts.create');


Route::post('/posts', function (Request $request) {

    Post::create([
        'user_id' => $request->input('user_id'),
        'category_id' => $request->input('category_id'),
        'title' => $request->input('title'),
        'sub_title' => $request->input('sub_title'),
        'body' => $request->input('body'),
        'published_at' => $request->input('published_at'),
    ]);

    return redirect()->route('posts');
})->name('posts.store');

Route::get('/posts/{post}', function (Post $post) {
    return view('posts.show', [
        'post' => $post->load(['category', 'user']),
    ]);
})->name('posts.show');

Route::get('/posts/{post}/edit', function (Post $post) {
    return view('posts.edit', [
        'post' => $post,
        'categories' => Category::all(),
        'users' => User::all(),
    ]);
})->name('posts.edit');

Route::put('/posts/{post}/update', function (Post $post, Request $request) {
    $post->update([
        'user_id' => $request->input('user_id'),
        'category_id' => $request->input('category_id'),
        'title' => $request->input('title'),
        'sub_title' => $request->input('sub_title'),
        'body' => $request->input('body'),
        'published_at' => $request->input('published_at'),
    ]);

    return redirect()->route('posts');

})->name('posts.update');

Route::delete('/posts/{post}/delete', function (Post $post) {
    $post->delete();
    return redirect()->route('posts');
})->name('posts.delete');

