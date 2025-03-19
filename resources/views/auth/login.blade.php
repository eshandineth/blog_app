@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-center text-2xl font-bold mb-4">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input type="checkbox" name="remember" id="remember_me" class="form-checkbox text-orange-500">
                    <span class="ml-2 text-gray-700">Remember me</span>
                </label>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded-lg">Login</button>
            </div>
        </form>

        <p class="text-center text-sm text-gray-500">Don't have an account? <a href="{{ route('register') }}" class="text-orange-500">Register</a></p>
    </div>
@endsection
