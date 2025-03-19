<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-semibold text-indigo-600 mb-2">Welcome, {{ Auth::user()->name }}</h2>
                @if(!Auth::user()->email_verified_at)
                    <p class="text-red-600 mb-4">Your email is not verified. <a href="{{ route('email.verify.send') }}" class="text-blue-600 hover:underline">Click here to verify</a></p>
                @endif
            </div>

            <div class="space-y-4">
                <!-- Add Post Link -->
                <a href="{{ route('posts.create') }}" class="block text-center bg-indigo-600 text-white py-3 px-6 rounded-md shadow-md hover:bg-indigo-700 transition duration-200">Create a New Post</a>

                <!-- View All Posts Link -->
                <a href="{{ route('posts.index') }}" class="block text-center bg-indigo-600 text-white py-3 px-6 rounded-md shadow-md hover:bg-indigo-700 transition duration-200">View All Posts</a>
            </div>

            <div class="mt-6 text-center">
                <!-- Logout Link -->
                <a href="{{ route('logout') }}" class="text-red-600 hover:underline">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>
