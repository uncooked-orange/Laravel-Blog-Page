@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Posts</h1>

    @if($posts->isEmpty())
        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md shadow-sm text-center">
            <p class="font-medium">No posts found. Share your first blog post!</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <a href="{{ route('posts.show', $post) }}" class="block group">
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <!-- Image -->
                        <div class="w-full">
                            @if($post->imagePath)
                                <img src="{{ asset('storage/images/' . $post->imagePath) }}" 
                                     alt="{{ $post->title }}" 
                                     class="w-full max-h-[300px] object-cover">
                            @else
                                <div class="w-full max-h-[300px] bg-gray-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-5">
                            <h2 class="text-xl font-bold text-gray-900 mb-2">
                                {{ $post->title }}
                            </h2>
                            <p class="text-gray-600 text-sm mb-3">
                                {{ Str::limit($post->content, 100) }}
                            </p>

                            <!-- Author Section -->
                            <div class="flex items-center space-x-3 mt-4">
                                <!-- Check if the post has a user -->
                                @if($post->user)
                                    <!-- User Avatar -->
                                    <img src="{{ $post->user->avatar ? asset($post->user->avatar) : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($post->user->email))) . '?d=mp' }}" 
                                         alt="{{ $post->user->name }}" 
                                         class="w-10 h-10 rounded-full object-cover">

                                    <!-- User Name -->
                                    <span class="text-sm font-medium text-gray-700">{{ $post->user->name }}</span>
                                @else
                                    <!-- Default Text If No User -->
                                    <span class="text-sm font-medium text-gray-700">Anonymous</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
