@extends('user.layouts.user-layout')

@section('content')

<div class="p-5 md:p-20 grid grid-cols-1 gap-10">
    <form action="{{ route('blog.index', request()->query()) }}" class="bg-transparent">
        <div class="flex my-2">
            <input type="text" name="q" placeholder="Search blog title or blog content..." class="block p-2.5 w-full font-concert tracking-wide font-normal text-sm md:text-md text-[#4682A9] bg-white rounded-lg border-4 border-[#4682A9] focus:ring-black focus:ring-0" />
            <button type=" submit" class="ml-2 bg-[#4682A9] hover:bg-[#40769a] text-white px-4 py-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 bg-transparent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </form>



    <div class="grid grid-cols-2 gap-0 items-center justify-between bg-transparent">
        <div class="bg-transparent">
            <p class="text-3xl md:text-5xl w-fit bg-transparent font-bold  text-white font-concert px-0">Blogs</p>
        </div>
        <div class="bg-transparent">
            <a type="button" href="{{ route('blog.create') }}" class="bg-[#004AAD] w-fit grid float-right p-3 rounded-xl text-md md:text-md font-concert text-white hover:bg-blue-900">Publish
                New
                Blog</a>
        </div>
    </div>
    @if(!empty($searched))
    @foreach($searched as $search)


    <div class="bg-white p-5 md:p-10 rounded-xl">
        <div class="flex items-center bg-transparent pb-5">
            <a href="{{ route('profile.show', $search->user_id) }}" class="bg-transparent">
                <div class="bg-transparent">
                    @if(isset($search->user_image))
                    <img src="{{ asset('uploads/' . $search->user_image) }}" class="w-16 h-16 rounded-full border-4 border-[#4682A9] bg-transparent" />
                    @else
                    <p>No Image</p>
                    @endif
                </div>
            </a>
            <div class="bg-transparent">
                <p class="text-2xl md:text-xl font-bold bg-transparent px-3 font-concert text-[#4682A9]">
                    {{ $search->user_name }}</p>
            </div>
        </div>
        <div class="flex flex-col border-4 border-[#4682A9] text-lg bg-white font-concert text-[#4682A9] p-4 md:p-0 md:pt-5 md:pl-10 md:pr-10 md:pb-10 rounded-xl ">
            <div class="flex items-center bg-white">

                @if($search->user_id == Auth::user()->id)
                <div class="w-full flex justify-end items-start bg-white">
                    <a href="{{ route('blog.edit', $search->blog_id) }}" class="bg-white text-blue-500 rounded-full px-2 ">
                        <svg class="w-6 h-6 text-gray-800 bg-white dark:text-white hover" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="green" viewBox="0 0 20 18">
                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                        </svg>
                    </a>
                    <form method="POST" action="{{ route('blog.destroy', $search->blog_id) }}" style="background-color: white; display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href="{{ route('blog.destroy', $search->blog_id) }}" class="bg-white rounded-full text-red-500">
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

            <p class="text-2xl md:text-3xl font-bold bg-white">{{ $search->blog_title }}</p>
            <p class="text-sm md:text-lg whitespace-pre-line font-thin text-justify bg-white">
                {{ $search->blog_content }}
            </p>
            <div class="fixed-height">
                <p class="bg-white px-0 text-sm text-gray-400">Date Posted:
                    {{ $search->created_at->format('F d, Y \a\t h:ia') }}</p>
            </div>
            <div class="w-fit whitespace-nowrap float-left bg-white pt-7">
                <a href="{{ route('blog.show', $search->blog_id) }}" class="text-white p-2  text-sm md:text-lg rounded-xl bg-[#4682A9]">
                    Show Blog </a>
            </div>
        </div>

    </div>

    @endforeach
    @else
    <div></div>
    @endif
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

@endsection