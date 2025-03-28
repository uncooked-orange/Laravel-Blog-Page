@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="mb-4 text-center">
            <h2 class="text-2xl font-bold text-gray-900">{{ __('Register') }}</h2>
        </div>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                <input id="name" type="text" class="mt-1 block w-full rounded-md hadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="mt-1 block w-full rounded-md hadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Avatar -->
            <div class="mb-4">
                <label for="avatar" class="block text-sm font-medium text-gray-700">{{ __('Profile Picture') }}</label>
                <div class="mt-1 flex items-center">
                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                    <input type="file" id="avatar" name="avatar" class="ml-5 bg-white py-2 px-3 border  rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </div>
                @error('avatar')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                <input id="password" type="password" class="mt-1 block w-full rounded-md  shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="mt-1 block w-full rounded-md  shadow-sm focus:border-indigo-500 focus:ring-indigo-500" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection