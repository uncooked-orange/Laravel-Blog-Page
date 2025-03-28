@extends('layouts.app')

@section('content')
<div class="py-14">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            @if (session('status'))
                <div class="mb-4 text-green-700 bg-green-100 p-4 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-900">Profile Information</h2>
                <p class="mt-1 text-sm text-gray-600">
                    Update your account profile information.
                </p>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" disabled
                           class="w-full px-4 py-2 bg-gray-100 border rounded-lg">
                </div>

                <!-- Avatar Upload -->
                <div class="mb-4">
                    <label for="avatar" class="block text-gray-700 font-semibold mb-2">Profile Picture</label>
                    
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            @if($user->avatar)
                                <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" class="h-24 w-24 rounded-full object-cover">
                            @else
                                <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center">
                                    <svg class="h-12 w-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        
                        <div class="ml-5">
                            <input type="file" id="avatar" name="avatar" 
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none @error('avatar') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-gray-500">JPG, PNG, GIF up to 2MB</p>
                            @error('avatar')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-center items-center">
                    <button type="submit" class="px-4 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
