@extends('user.layouts.user-layout')

@section('content')

<div class="p-5 md:p-20 grid grid-cols-1 gap-10 ">
    <div class="relative -mb-5 py-0">
        <a href="{{ route('blog.index') }}" type="button" class="float-left z-10 px-7 py-2 text-xl font-medium font-concert text-white rounded-full w-fit bg-[#004AAD] hover:bg-[#31568a]">
            <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-800 dark:text-white bg-transparent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
        </a>
    </div>
    @foreach($tbl_blog as $data)
    <div class="bg-white p-5 md:p-10 rounded-xl">
        <div class="flex items-center bg-transparent pb-5">
            @foreach($user_data as $ud)
            <a href="{{ route('profile.show', $ud->user_id) }}" class="bg-transparent">
                <div class="bg-transparent">

                    @if(isset($ud->user_image))
                    <img src="{{ asset('uploads/' . $ud->user_image) }}" class="w-16 h-16 rounded-full border-4 border-[#4682A9] bg-transparent" />
                    @else
                    <p>No Image</p>
                    @endif
                </div>
            </a>
            @endforeach
            <div class="bg-transparent">
                <p class="text-2xl md:text-xl font-bold bg-transparent px-3 font-concert text-[#4682A9]">
                    {{ $ud->user_name }}</p>
            </div>
        </div>
        <div class="flex flex-col border-4 border-[#4682A9] text-lg bg-white font-concert text-[#4682A9] pt-5 pl-5 pr-5 pb-8 rounded-xl ">

            <div class="flex flex-col w-full bg-white">


                <div class="h-fit">
                    <p class="text-lg md:text-xl font-bold bg-white">{{ $data->blog_title }}</p>
                    <p class="text-sm md:text-lg whitespace-pre-line font-thin text-justify bg-white">
                        {{ $data->blog_content }}
                    </p>
                </div>
                <div class="h-fit">
                    <p class="text-xs font-thin bg-white pt-2">Categories:
                        {{ implode(', ', $data->categories) }}
                        | Tags:
                        {{ implode(', ', $data->tags) }}</p>
                </div>
                <div class="fixed-height">
                    <p class="bg-white px-0 text-sm text-gray-400">
                        Date Posted: {{ $data->created_at }}
                    </p>

                </div>

            </div>
        </div>
        <div class="py-2 pt-8 grid gap-5 bg-white">
            <p class="font-concert text-[#4682A9] text-lg md:text-xl font-bold bg-white">Comments:</p>

            @foreach($tbl_comment as $comment)
            <div class="p-2 rounded-xl bg-white border-4 border-[#4682A9] ">
                <a href="{{ route('profile.show', $comment->user_id) }}" class="bg-transparent">
                    <div class="p-2 bg-transparent ">
                        @if(isset($comment->user_image))
                        <img src="{{ asset('uploads/' . $comment->user_image) }}" class="w-14 h-14 rounded-full border-4 border-[#4682A9]" />
                        @else
                        <p>No Image</p>
                        @endif

                    </div>
                </a>
                <p class="bg-white block px-2 w-full font-concert tracking-wide font-normal text-md md:text-lg text-[#4682A9] rounded-lg focus:ring-black focus:ring-0">
                    {{ $comment->user_name }}
                </p>
                <p class="bg-white block px-2 w-full font-concert tracking-wide font-thin text-sm md:text-md text-[#4682A9] rounded-lg focus:ring-black focus:ring-0">
                    {{ $comment->comment_content }}
                </p>
            </div>
            @endforeach

        </div>
        <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data" class="bg-transparent">
            @csrf
            <div class="bg-transparent pt-5 flex items-center">
                <input type="hidden" name="blog_id" value="{{ $data->blog_id }}"></input>
                <input type="text" name="comment_content" class="block p-2.5 w-full font-concert tracking-wide font-normal text-sm md:text-md text-[#4682A9] bg-white rounded-lg border-4 border-[#4682A9] focus:ring-black focus:ring-0" placeholder="Write a comment..." required>
                <button type="submit" class="ml-2 bg-[#4682A9] hover:bg-[#40769a] text-white px-4 py-2 rounded-md"><svg class="w-6 h-8 text-gray-800 dark:text-white bg-transparent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 20 18">
                        <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                    </svg></button>

            </div>
        </form>
    </div>

    @endforeach
</div>


<style>
    * {
        background-color: #91C8E4;
        z-index: 50;
    }


    .post {
        -webkit-text-stroke-width: 2px;
        -webkit-text-stroke-color: #316a72;
    }
</style>

@endsection