<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog-IT</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <style>
    * {
        z-index: 50;
    }
    </style>
    @vite('resources/js/app.js')
    @laravelPWA
</head>

@include('user.components.cloud')

<body class="bg-gradient-to-r from-blue-300 to-[#B4ECFF]">
    <!-- Session Status -->
    <div class="w-full h-screen grid items-center border-2 place-items-center">
        <div class="w-96 bg-white font-concert p-5 md:p-10 rounded-xl  bg-transparent">
            <div class="grid place-items-center pb-3">
                <img src="/images/MyDiary.png" class="w-36 h-fit" />
            </div>

            @auth
            <div>
                <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-gray-800">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Logout</button>
                </form>
            </div>
            @else
            <form method="POST" action="{{ route('register') }}" class="w-full max-w-md">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        autocomplete="name" class="mt-1 p-2 w-full border rounded-md">
                    @error('name')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        autocomplete="username" class="mt-1 p-2 w-full border rounded-md">
                    @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="mt-1 p-2 w-full border rounded-md">
                    @error('password')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-600">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password" class="mt-1 p-2 w-full border rounded-md">
                    @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('login') }}"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit"
                        class="ms-4 bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('Register') }}</button>
                </div>
            </form>
            @endauth
        </div>
    </div>
</body>

</html>