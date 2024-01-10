<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <style>
    body {
        z-index: 50;
    }
    </style>
    @vite('resources/js/app.js')
</head>


<body class="bg-gradient-to-r from-blue-300 to-[#B4ECFF]">
    @include('user.components.navbar')
    @include('user.components.header')
    <div class="py-0">

        <div class="w-full mx-auto p-5 md:p-20 grid gap-10">
            <p class="text-3xl md:text-5xl w-fit bg-transparent font-bold  text-white font-concert px-0">Settings</p>
            <div class="p-5 sm:p-8 bg-white shadow sm:rounded-lg border-4 border-[#4682A9] rounded-xl">
                <div class="max-w-xl ">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-5 sm:p-8 bg-white shadow sm:rounded-lg border-4 border-[#4682A9] rounded-xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-5 sm:p-8 bg-white shadow sm:rounded-lg border-4 border-[#4682A9] rounded-xl">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>