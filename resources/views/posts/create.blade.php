@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-center text-2xl font-bold mb-4">Create New Post</h2>

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700">Content</label>
                <textarea name="content" id="content" class="w-full p-2 border border-gray-300 rounded-lg" rows="5" required></textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded-lg">Create Post</button>
            </div>
        </form>
    </div>
@endsection
