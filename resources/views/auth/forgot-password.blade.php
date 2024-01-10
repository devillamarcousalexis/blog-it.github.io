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
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="w-full max-w-md">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 p-2 w-full border rounded-md">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>