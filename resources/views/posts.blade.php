@extends('components.layout')
@section('title_browser', 'Posts - Dexma Blog')
@section('title_page', 'Posts')

@section('main')
    <div class="text-end">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
            <a href="{{ route('posts.create') }}">Create Post</a>
        </button>
    </div>
    <div>
    @foreach ($posts as $post)
            <div class="my-5">
                <div class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                    <div class="flex justify-between">
                            <a href="{{route('posts.show', $post->id)}}" class="font-bold text-2xl hover:underline cursor-pointer">
                                {{ $post->title }}
                            </a>
                        <div class="text-sm">
                            Published at: {{ $post->published_at->DiffForHumans() }}
                        </div>
                    </div>
                    <div class="font-bold text-lg text-slate-400 my-3 w-50">
                        {{ $post->sub_title }}
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
        @endforeach
    </div>
@endsection
