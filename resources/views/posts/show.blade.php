@extends('layouts.app')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-semibold text-gray-800">Post Details</h1>
        <div class="flex space-x-3">
            @auth
                @if(auth()->user()->id === $post->user_id)
                    <a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Edit</a>
                @endif
            @endauth
            <a href="{{ route('posts.index') }}" class="px-4 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100">Back to List</a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        @if($post->imagePath)
            <div class="mb-4 rounded-lg overflow-hidden">
                <img src="{{ asset('storage/images/' . $post->imagePath) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
            </div>
        @endif

        <h2 class="text-2xl font-semibold text-gray-800">{{ $post->title }}</h2>
        
        @if($post->content)
            <p class="mt-3 text-gray-600">{{ $post->content }}</p>
        @endif
        
        <div class="mt-4 text-sm text-gray-500">
            <p>Created: {{ $post->created_at->format('M d, Y H:i') }}</p>
            <p>Last Updated: {{ $post->updated_at->format('M d, Y H:i') }}</p>
        </div>
        
        @auth
            @if(auth()->user()->id === $post->user_id)
                <div class="mt-6">
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
@endsection
