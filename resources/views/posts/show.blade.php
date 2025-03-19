<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <!-- Back to All Posts Button -->
        <a href="{{ route('posts.index') }}" class="inline-block text-indigo-600 mb-6 hover:underline">← Back to All Posts</a>

        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-semibold text-indigo-600 mb-4">{{ $post->title }}</h2>

            <!-- Display image if exists -->
            @if($post->image)
            <img src="{{ asset($post->image) }}" alt="Post Image" class="w-full h-auto mt-4 rounded-lg">
            @endif

            <div class="mt-6">
                <p class="text-lg text-gray-700">{!! nl2br(e($post->content)) !!}</p>
            </div>
        </div>
    </div>

</body>
</html>
