<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    @vite('resources/js/app.js')
    @laravelPWA
</head>


<body class="bg-gradient-to-r from-blue-300 to-[#B4ECFF]">
    @include('user.components.navbar')
    @include('user.components.cloud')
    <div class="container bg-gradient-to-r from-blue-300 to-[#B4ECFF]">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>