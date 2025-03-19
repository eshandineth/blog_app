<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-semibold text-indigo-600 mb-6 text-center">Edit Post</h2>

            <!-- Back to Dashboard Button -->
            <a href="{{ route('posts.index') }}" class="inline-block text-indigo-600 mb-4 hover:underline">← Back to All Posts</a>

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title Input -->
                <input type="text" name="title" placeholder="Title" value="{{ old('title', $post->title) }}" required class="block w-full p-3 mb-4 border border-gray-300 rounded-md">

                <!-- Content Input -->
                <textarea name="content" placeholder="Content" required class="block w-full p-3 mb-4 border border-gray-300 rounded-md">{{ old('content', $post->content) }}</textarea>

                <!-- Current Image Preview -->
                @if($post->image)
                    <p class="text-gray-700">Current Image:</p>
                    <img src="{{ asset($post->image) }}" alt="Post Image" class="w-full h-auto mt-4 rounded-lg">
                @endif

                <!-- Image Upload Input -->
                <input type="file" name="image" accept="image/*" class="block w-full p-3 mt-4 border border-gray-300 rounded-md">

                <!-- Submit Button -->
                <button type="submit" class="bg-indigo-600 text-white p-3 rounded-md w-full hover:bg-indigo-700 transition duration-200">Update Post</button>
            </form>

            <!-- Back to Dashboard Button -->
            <a href="{{ route('posts.index') }}" class="mt-4 inline-block text-indigo-600 hover:underline">← Back to All Posts</a>
        </div>
    </div>

</body>
</html>
