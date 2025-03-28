<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
    <nav class="bg-cyan-500 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4">
            <!-- Logo -->
            <a href="{{ route('posts.index') }}" class="text-2xl font-extrabold tracking-wide">MyBlog</a>

            <!-- Mobile Menu Toggle -->
            <button id="menu-toggle" class="lg:hidden p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
                ☰
            </button>

            <!-- Navbar Links -->
            <div id="nav-links" class="hidden lg:flex space-x-6">
                <a href="{{ route('posts.index') }}" class="font-semibold hover:text-gray-300 transition">Home</a>

                @auth
                    <a href="{{ route('posts.create') }}" class="font-semibold hover:text-gray-300 transition">Create Post</a>
                    <a href="{{ route('profile.edit') }}" class="font-semibold hover:text-gray-300 transition">Profile</a>
                    
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="font-semibold hover:text-gray-300 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="font-semibold hover:text-gray-300 transition">Login</a>
                    <a href="{{ route('register') }}" class="font-semibold hover:text-gray-300 transition">Register</a>
                @endauth
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="hidden lg:hidden bg-cyan-600 text-white p-4 space-y-3">
            <a href="{{ route('posts.index') }}" class="block hover:text-gray-300 transition">Home</a>
            
            @auth
                <a href="{{ route('posts.create') }}" class="block hover:text-gray-300 transition">Create Post</a>
                <a href="{{ route('profile.edit') }}" class="block hover:text-gray-300 transition">Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left hover:text-gray-300 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block hover:text-gray-300 transition">Login</a>
                <a href="{{ route('register') }}" class="block hover:text-gray-300 transition">Register</a>
            @endauth
        </div>
    </nav>

    <main class="container mx-auto mt-6 px-4">
        @if(session()->has('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4 shadow-md">
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </main>

    <script>
        // Mobile Menu Toggle
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
