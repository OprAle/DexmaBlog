<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Post\PostIndexResource;
use App\Http\Resources\Post\PostShowResource;
use App\Http\Resources\User\UserResource;
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
        $posts = Post::latest()->with(['category', 'user'])->get();

        return view('posts')->with(
            'posts',
            PostIndexResource::collection($posts)
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        $users = User::all();

        return view('posts.create')
            ->with('categories', CategoryResource::collection($categories))
            ->with('users', UserResource::collection($users));
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
        return view('posts.show')->with('post', new PostShowResource($post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        $categories = Category::all();
        $users = User::all();


        return view('posts.edit')
            ->with('post', new PostShowResource($post))
            ->with('categories', CategoryResource::collection($categories))
            ->with('users', UserResource::collection($users));
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
