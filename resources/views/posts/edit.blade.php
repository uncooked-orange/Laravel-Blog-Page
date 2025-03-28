@extends('layouts.app')

@section('content')
<div class="py-14">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-900">Edit Post</h2>
            </div>

            @if (auth()->check() && auth()->user()->id === $post->user->id)
                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none @error('title') border-red-500 @enderror" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $post->title }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-semibold mb-2">Content (Optional)</label>
                        <textarea id="content" name="content" rows="3"
                                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none @error('content') border-red-500 @enderror">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $post->content }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-4 flex items-center space-x-4">
                        <!-- image preview -->
                        @if($post->imagePath)
                            <div class="rounded overflow-hidden w-max h-24">
                                <img src="{{ asset('storage/images/' . $post->imagePath) }}" alt="{{ $post->title }}" class="h-24 w-24 rounded-full object-cover">
                            </div>
                        @endif
                        <div>
                            <label for="imagePath" class="block text-gray-700 font-semibold mb-2">Upload Image (Optional)</label>
                            <input type="file" id="imagePath" name="imagePath"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none @error('imagePath') border-red-500 @enderror">
                            @error('imagePath')
                                <p class="text-red-500 text-sm mt-1">{{ $post->imagePath }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('posts.index') }}" class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition">Update Post</button>
                    </div>
                </form>
            @else
                <div class="mb-4 text-red-700 bg-red-100 p-4 rounded-lg">
                    You are not authorized to edit this post.
                </div>
                <div class="flex justify-center">
                    <a href="{{ route('posts.index') }}" class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">Go Back</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection