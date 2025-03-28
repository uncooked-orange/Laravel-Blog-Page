@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Create New Post</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Hidden Field for User ID -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <!-- Title Input -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none @error('title') border-red-500 @enderror" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content Input -->
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
                <textarea id="content" name="content" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="imagePath" class="block text-gray-700 font-semibold mb-2">Upload Image</label>
                <input type="file" id="imagePath" name="imagePath"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none @error('imagePath') border-red-500 @enderror">
                @error('imagePath')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center">
                <a href="{{ route('posts.index') }}" class="px-4 py-2 text-gray-700 border rounded-lg hover:bg-gray-200 transition">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition">
                    Create Post
                </button>
            </div>
        </form>
    </div>
@endsection
