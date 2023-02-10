@extends('components.layout')
@section('title_browser', 'Create post - Dexma Blog')
@section('title_page', 'Create post')

@section('main')
    <div class="px-40">
        <div class="my-5">
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded">
                <a href="{{ route('posts.index') }}">
                    < Back to posts</a>
            </button>
        </div>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div>
                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
                    </label>
                    <input id="title" name="title" value="{{ old('title') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('title') border-red-500 @enderror"
                        type="text" placeholder="Insert title">
                    @error('title')
                        <div class="text-red-500 text-sm mt-3 font-bold">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="sub_title">
                        Sub title
                    </label>
                    <textarea id="sub_title" name="sub_title"
                        class="bg-gray-50 border
                        border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        @error('sub_title') border-red-500 @enderror"
                        rows="2" placeholder="Insert sub title">{{ old('sub_title') }}</textarea>
                    @error('sub_title')
                        <div class="text-red-500 text-sm mt-3 font-bold">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                        Body
                    </label>
                    <textarea id="body" name="body"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('body') border-red-500 @enderror"
                        rows="5" placeholder="Insert body">{{ old('body') }}</textarea>
                    @error('body')
                        <div class="text-red-500 text-sm mt-3 font-bold">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="published_at">
                        Published at
                    </label>
                    <input id="published_at" name="published_at" value="{{ old('published_at') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('published_at') border-red-500 @enderror"
                        type="datetime-local" placeholder="Insert when the post will be published">
                    @error('published_at')
                        <div class="text-red-500 text-sm mt-3 font-bold">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                        Author
                    </label>
                    <select id="user_id" name="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('user_id') border-red-500 @enderror">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" selected="{{ old('user_id') == $user->id }}">
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-red-500 text-sm mt-3 font-bold">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
                        Category
                    </label>
                    <select id="category_id" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('category_id') border-red-500 @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" selected="{{ old('category_id') == $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-red-500 text-sm mt-3 font-bold">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="text-center mt-10">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded" type="submit">
                    Create post
                </button>
            </div>
        </form>
    </div>
@endsection
