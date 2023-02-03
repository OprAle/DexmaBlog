<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('posts', [
            'posts' => Post::latest()->with(['category', 'user'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create', [
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Post::create([
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'sub_title' => $request->input('sub_title'),
            'body' => $request->input('body'),
            'published_at' => $request->input('published_at'),
        ]);

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post->load(['category', 'user']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request) {
        $post->update([
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'sub_title' => $request->input('sub_title'),
            'body' => $request->input('body'),
            'published_at' => $request->input('published_at'),
        ]);

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts');
    }
}
