<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-semibold text-indigo-600 mb-6 text-center">Create a New Post</h2>

            <!-- Back to Dashboard Button -->
            <a href="{{ route('dashboard') }}" class="inline-block text-indigo-600 mb-4 hover:underline">← Back to Dashboard</a>

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title Input -->
                <input type="text" name="title" placeholder="Title" value="{{ old('title') }}" required class="block w-full p-3 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">

                <!-- Content Input -->
                <textarea name="content" placeholder="Content" required class="block w-full p-3 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('content') }}</textarea>

                <!-- Image Upload Input -->
                <input type="file" name="image" accept="image/*" class="block w-full p-3 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">

                <!-- Submit Button -->
                <button type="submit" class="bg-indigo-600 text-white p-3 rounded-md w-full hover:bg-indigo-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">Create Post</button>
            </form>
        </div>
    </div>

</body>
</html>
