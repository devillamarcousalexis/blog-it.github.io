@extends('user.layouts.user-layout')

@section('content')

<div class="w-full mx-auto p-5 md:p-20 grid gap-10">
    <div class="relative -mb-5 py-0">
        <a href="{{ route('blog.index') }}" type="button" class="float-left z-10 px-7 py-2 text-xl font-medium font-concert text-white rounded-full w-fit bg-[#004AAD] hover:bg-[#31568a]">
            <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-800 dark:text-white bg-transparent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
        </a>
    </div>

    <div class="">
        <p class="text-4xl md:text-5xl font-bold bg-transparent text-white font-concert px-0">Publish New Blog</p>
    </div>
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="py-0">
            <label for="message" class="block mb-2 text-lg md:text-xl font-medium font-concert text-[#40779b] dark:text-white">Blog
                Title</label>
            <input type="text" name="blog_title" class="block p-2.5 w-full font-concert tracking-wide font-normal text-md md:text-lg text-[#4682A9] bg-white rounded-lg border-4 border-[#4682A9] focus:ring-black focus:ring-0" placeholder="Write the blog title here..." required></input>
        </div>
        <div class="py-5">
            <label for="message" class="block mb-2 text-lg md:text-xl font-medium font-concert text-[#40779b] dark:text-white">Blog
                Content</label>
            <textarea id="message" name="blog_content" rows="4" class="block p-2.5 w-full font-concert tracking-wide font-normal text-md md:text-lg text-[#4682A9] bg-white rounded-lg border-4 border-[#4682A9] focus:ring-black focus:ring-0" placeholder="Write your thoughts here..." required></textarea>
        </div>
        <div class="py-5">
            <label for="message" class="block mb-2 text-lg md:text-xl font-medium font-concert text-[#40779b] dark:text-white">Blog
                Category<span class="text-xs px-2">(You can add your category in the 'Profile' page.)</span></label>
            <ul class="w-full grid grid-cols-3 md:grid-cols-7 gap-5 font-concert ">
                @foreach($tbl_category as $data)
                <li class="flex gap-5">
                    <input type="checkbox" name="category_id[]" id="category-{{ $data->category_id }}" value="{{ $data->category_id }}" class="hidden peer">
                    <label for="category-{{ $data->category_id }}" class="md:whitespace-nowrap inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border-4 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-[#4682A9] hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        {{ $data->category_name }}
                    </label>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="py-5">
            <label for="message" class="block mb-2 text-lg md:text-xl font-medium font-concert text-[#40779b] dark:text-white">Blog
                Tags<span class="text-xs px-2">(You can add your tags in the 'Profile' page.)</span></label>
            <ul class="w-full grid grid-cols-3 md:grid-cols-7 gap-5 font-concert ">
                @foreach($tbl_tags as $data)
                <li class="flex gap-5">
                    <input type="checkbox" name="tags_id[]" id="tag-{{ $data->tags_id }}" value="{{ $data->tags_id }}" class="hidden peer">
                    <label for="tag-{{ $data->tags_id }}" class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border-4 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-[#4682A9] hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        {{ $data->tags_name }}
                    </label>
                </li>
                @endforeach

            </ul>
            <!-- <div id="userTagsContainer">
                <div class="flex gap-5 mt-4">
                    <input type="text" name="user_tags[]" class="border p-2 rounded-md w-48">
                    <button type="button" onclick="addTagInput()" class="bg-blue-500 text-white p-2 rounded-md">Add
                        More Tags</button>
                </div>
            </div> -->
        </div>
        <div class="py-3">
            <button type="submit" class="float-right z-10 px-7 py-2 text-lg md:text-xl font-medium font-concert text-white rounded-full w-fit bg-[#4682A9] hover:bg-[#40779b]">
                Post
            </button>
        </div>
    </form>
</div>


<style>
    * {
        background-color: transparent;
        z-index: 50;
    }

    .post {
        -webkit-text-stroke-width: 2px;
        -webkit-text-stroke-color: #316a72;
    }
</style>

<script>
    function addTagInput() {
        var container = document.getElementById('userTagsContainer');
        var newInput = document.createElement('div');
        newInput.className = 'flex gap-5 mt-4';

        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'user_tags[]';
        input.className = 'border p-2 rounded-md w-48';

        var addButton = document.createElement('button');
        addButton.type = 'button';
        addButton.className = 'bg-blue-500 text-white p-2 rounded-md';
        addButton.innerHTML = 'Add More Tags';
        addButton.onclick = addTagInput;

        newInput.appendChild(input);
        newInput.appendChild(addButton);

        container.appendChild(newInput);
    }
</script>
@endsection