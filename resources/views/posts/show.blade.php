@extends('components.layout')
@section('title_browser', "Post: $post->title - Dexma Blog")
@section('title_page', 'Post:' . $post->title)

@section('main')
<div>
    <div class="my-5">
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded">
            <a href="{{ route('posts') }}">
                < Back to posts</a>
        </button>
    </div>
    <div class="my-5">
        <div class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
            <div class="flex justify-between">
                <h3 class="font-bold text-2xl">
                    {{ $post->title }}
                </h3>
                <div class="text-sm">
                    Published at: {{ $post->published_at->DiffForHumans() }}
                </div>
            </div>
            <div class="mt-3 font-bold text-slate-500">
                <p>By: {{$post->user->name}}</p>
            </div>
            <div class="font-bold text-lg text-slate-400 my-3 w-50">
                {{ $post->sub_title }}
            </div>
            <div class="my-5">
                <p>{{ $post->body }}</p>
            </div>
            <div>
                <span class="bg-blue-200 rounded-full px-2 py-[0.1rem] text-sm font-semibold text-blue-700 mr-2">{{ $post->category->name }}</span>

            </div>
            <div class="text-end">
                <div class="text-sm">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                        <a href="{{ route('posts.delete', $post->id) }}">Delete</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection