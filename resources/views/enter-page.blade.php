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
    <div class="w-full h-screen grid text-center justify-center items-center p-20 md:p-0 ">
        <div class="h-fit">
            <img src="/images/MyDiary.png" class="w-96 md:w-72" />
            @if (Route::has('login'))
            <div class="w-full grid place-items-center">
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="bg-[#004AAD] hover:bg-[#00479d] w-72 rounded-full text-white text-4xl font-concert py-3">Home</a>

                @else
                <a href="{{ route('login') }}"
                    class="bg-[#004AAD] hover:bg-[#00479d] w-72 rounded-full text-white text-4xl font-concert py-3">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="bg-[#004AAD] hover:bg-[#00479d] w-72 rounded-full text-white text-4xl font-concert py-3 mt-4">Register</a>

                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>