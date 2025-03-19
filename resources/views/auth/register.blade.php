<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-96">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Register</h2>

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-semibold">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" required
                       class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-semibold">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required
                       class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-semibold">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required
                       class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-600 font-semibold">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required
                       class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <button type="submit"
                    class="w-full p-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Register
            </button>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800">Login here</a>
        </p>
    </div>
</body>
</html>
