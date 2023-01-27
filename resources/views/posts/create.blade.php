@extends('components.layout')
@section('title_browser', 'Create post - Dexma Blog')
@section('title_page', 'Create post')

@section('main')
    <div class="px-40">
        <div class="my-5">
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded">
                <a href="{{ route('posts') }}">< Back to posts</a>
            </button>
        </div>
        <form method="POST" action="{{route('posts.store')}}">
            @csrf
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
                    </label>
                    <input
                        id="title"
                        name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        type="text"
                        placeholder="Insert title"
                    >
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="sub_title">
                        Sub title
                    </label>
                    <textarea
                        id="sub_title"
                        name="sub_title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        rows="2"
                        placeholder="Insert sub title"
                    ></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                        Body
                    </label>
                    <textarea
                        id="body"
                        name="body"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        rows="5"
                        placeholder="Insert body"
                    ></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="published_at">
                        Published at
                    </label>
                    <input
                        id="published_at"
                        name="published_at"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        type="datetime-local"
                        placeholder="Insert when the post will be published"
                    >
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                        Author
                    </label>
                    <select
                        id="user_id"
                        name="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
                        Category
                    </label>
                    <select
                        id="category_id"
                        name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center mt-10">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded"
                    type="submit"
                >
                    Create post
                </button>
            </div>
        </form>
    </div>
@endsection
