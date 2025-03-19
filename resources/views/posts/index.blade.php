<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <!-- Back to Dashboard Button -->
        <a href="{{ route('dashboard') }}" class="inline-block text-indigo-600 mb-6 hover:underline">← Back to Dashboard</a>

        <h2 class="text-3xl font-semibold text-indigo-600 mb-6 text-center">View All Posts</h2>

        <!-- Create Post Button -->
        <a href="{{ route('posts.create') }}" class="bg-indigo-600 text-white p-2 rounded-md mb-4 inline-block hover:bg-indigo-700 transition duration-200">Create Post</a>

        <div class="mt-6 space-y-4">
            @foreach ($posts as $post)
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                    <h3 class="text-xl font-bold text-indigo-600">{{ $post->title }}</h3>
                    <p class="text-gray-700">{{ Str::limit($post->content, 100) }}</p>
                    <div class="mt-4">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-indigo-600 hover:underline">Read more</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-indigo-600 ml-4 hover:underline">Edit</a>

                        <!-- Delete Form -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 ml-4 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
