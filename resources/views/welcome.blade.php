@extends('layouts.app')

@section('content')
    <div class="bg-blue-500 h-screen flex flex-col justify-center items-center text-white">
        <!-- Header Section -->
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-4">Welcome to BlogApp</h1>
            <p class="text-lg mb-6">A place to share your thoughts with the world</p>
            <a href="{{ route('login') }}" class="btn mb-4">Login</a>
            <a href="{{ route('register') }}" class="btn mb-4">Register</a>
        </div>

        <!-- Recent Posts Section -->
        <div class="mt-12 max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-orange-500 mb-6">Recent Posts</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- @foreach ($posts as $post)
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold">{{ $post->title }}</h3>
                        <p class="text-gray-700">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="text-orange-500 hover:text-orange-600">Read More</a>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
