<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #91C8E4;
        }
    </style>
    @vite('resources/js/app.js')
</head>


<body>
    @include('user.components.navbar')
    @include('user.components.header')
    <div class="py-0">

        <div class="w-full mx-auto p-10 md:p-20 grid gap-10">
            <p class="text-3xl md:text-5xl w-fit bg-transparent font-bold  text-white font-concert px-0">Profile</p>
            <div class="p-5 sm:p-8 bg-white shadow sm:rounded-lg border-4 border-[#4682A9] rounded-xl">
                <div class="w-full grid place-items-center">
                    <div class="text-4xl font-concert text-[#4682A9] pb-7 pt-0">
                        {{ $user->name }}
                    </div>
                    <div class="">
                        <img src="{{ asset('uploads/'. $user->user_image) }}" class="w-48 h-48 rounded-full border-4 border-[#4682A9]" />
                    </div>
                    <div class="text-xl font-concert text-[#4682A9] pt-10">
                        {{ $user->user_about }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-0">

        <div class="w-full mx-auto p-10 md:p-20 grid gap-10">
            @foreach($tbl_blog as $data)
            <div class="bg-white p-10 rounded-xl">
                <div class="flex items-center bg-transparent pb-5">
                    <a href="{{ route('profile.show', $data->user_id) }}" class="bg-transparent">
                        <div class="bg-transparent">
                            @if(isset($data->user_image))
                            <img src="{{ asset('uploads/' . $data->user_image) }}" class="w-16 h-16 rounded-full border-4 border-[#4682A9] bg-transparent" />
                            @else
                            <p>No Image</p>
                            @endif
                        </div>
                    </a>
                    <div class="bg-transparent">
                        <p class="text-2xl md:text-xl font-bold bg-transparent px-3 font-concert text-[#4682A9]">
                            {{ $data->user_name }}</p>
                    </div>
                </div>
                <div class="flex flex-col border-4 border-[#4682A9] text-lg bg-white font-concert text-[#4682A9] pt-5 pl-10 pr-10 pb-10 rounded-xl ">
                    <div class="flex items-center bg-white">

                        @if($data->user_id == Auth::user()->id)
                        <div class="w-full flex justify-end items-start bg-white">
                            <a href="{{ route('blog.edit', $data->blog_id) }}" class="bg-white text-blue-500 rounded-full px-2 ">
                                <svg class="w-6 h-6 text-gray-800 bg-white dark:text-white hover" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="green" viewBox="0 0 20 18">
                                    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('blog.destroy', $data->blog_id) }}" style="background-color: white; display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" href="{{ route('blog.destroy', $data->blog_id) }}" class="bg-white rounded-full text-red-500">
                                    <svg class="w-6 h-6 text-gray-800 bg-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 18 20">
                                        <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        @else
                        <p class="pt-5"></p>
                        @endif
                    </div>

                    <p class="text-2xl md:text-3xl font-bold bg-white">{{ $data->blog_title }}</p>
                    <p class="text-sm md:text-lg whitespace-pre-line font-thin text-justify bg-white">
                        {{ $data->blog_content }}
                    </p>
                    <div class="fixed-height">
                        <p class="bg-white px-0 text-sm text-gray-400">Date Posted:
                            {{ $data->created_at->format('F d, Y \a\t h:ia') }}</p>
                    </div>
                    <div class="w-fit whitespace-nowrap float-left bg-white pt-7">
                        <a href="{{ route('blog.show', $data->blog_id) }}" class="text-white p-2  text-sm md:text-lg rounded-xl bg-[#4682A9]">
                            Show Blog </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>