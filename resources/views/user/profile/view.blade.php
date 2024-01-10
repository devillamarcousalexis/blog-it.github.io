<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    @vite('resources/js/app.js')
</head>


<body class="bg-gradient-to-r from-blue-300 to-[#B4ECFF]">
    @include('user.components.navbar')
    @include('user.components.header')
    <div class="py-0">

        <div class="w-full mx-auto p-5 md:p-20 grid gap-10">
            <p class="text-3xl md:text-5xl w-fit bg-transparent font-bold  text-white font-concert px-0">Profile</p>
            <div class="p-5 sm:p-8 bg-white shadow sm:rounded-lg border-4 border-[#4682A9] rounded-xl">
                <div class="w-full grid place-items-center">
                    <div class="text-4xl font-concert text-[#4682A9] pb-7 pt-0">
                        {{ $user->name }}
                    </div>
                    <div class="">
                        <img src="{{ asset('uploads/'. $user->user_image) }}"
                            class="w-48 h-48 rounded-full border-4 border-[#4682A9]" />
                    </div>
                    <div class="text-xl font-concert text-[#4682A9] pt-10">
                        {{ $user->user_about }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-0 ">

        <div class="p-5 md:p-20 grid grid-cols-1 gap-3 ">

            <div class="grid grid-cols-2 gap-0 items-center justify-between bg-transparent">
                <div class="bg-transparent">
                    <p class="text-3xl md:text-5xl w-fit bg-transparent font-bold  text-white font-concert px-0 py-5">
                        Category</p>
                </div>
                <div class="bg-transparent">
                    <a type="button" href="{{ route('category.create') }}"
                        class="bg-[#004AAD] w-fit grid float-right p-3 rounded-xl text-md md:text-md font-concert text-white hover:bg-blue-900">Add
                        New
                        Category</a>
                </div>
            </div>
            <div id="category-container" class="py-0 grid gap-2">
                @include('user.components.category-pagination')
            </div>


        </div>
    </div>
    <div class="py-0">

        <div class="p-5 md:p-20 grid grid-cols-1 gap-3 ">

            <div class="grid grid-cols-2 gap-0 items-center justify-between bg-transparent">
                <div class="bg-transparent">
                    <p class="text-3xl md:text-5xl w-fit bg-transparent font-bold  text-white font-concert  px-0 py-5">
                        Tags
                    </p>
                </div>
                <div class="bg-transparent">
                    <a type="button" href="{{ route('tags.create') }}"
                        class="bg-[#004AAD] w-fit grid float-right p-3 rounded-xl text-md md:text-md font-concert text-white hover:bg-blue-900">Add
                        New
                        Tag</a>
                </div>
            </div>
            <div id="tags-container" class="py-0 grid gap-2">
                @include('user.components.tags-pagination')
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        $('body').on('click', '#category-pagination a', function(event) {
            event.preventDefault();
            var url = $(this).attr('href');
            loadPagination('category', url);
        });

        $('body').on('click', '#tags-pagination a', function(event) {
            event.preventDefault();
            var url = $(this).attr('href');
            loadPagination('tags', url);
        });
    });

    function loadPagination(section, url) {
        $.ajax({
            url: url,
            data: {
                section: section
            },
            success: function(response) {
                $('#' + section + '-container').html(response);
            }
        });
    }
    </script>
</body>

</html>