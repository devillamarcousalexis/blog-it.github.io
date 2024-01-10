@extends('user.layouts.user-layout')

@section('content')

<div class="w-full mx-auto p-5 md:p-20 grid gap-10">
    <div class="relative -mb-5 py-0 ">
        <a href="{{ route('profile.index') }}" type="button"
            class="float-left z-10 px-7 py-2 text-xl font-medium font-concert text-white rounded-full w-fit bg-[#004AAD] hover:bg-[#31568a]">
            <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-800 dark:text-white bg-transparent" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
        </a>
    </div>
    <div class="">
        <p class="text-3xl md:text-5xl font-bold bg-transparent text-white font-concert px-0">Update Tags</p>
    </div>
    <form method="POST" action="{{ route('tags.update', $tbl_tags->tags_id) }}">
        @csrf
        @method('PUT')
        <div class="">
            <label for="message"
                class="block mb-2 text-lg md:text-xl font-medium font-concert text-[#40779b] dark:text-white">Tags
                Name</label>
            <input type="text" name="tags_name"
                class="block p-2.5 w-full font-concert tracking-wide font-normal text-md md:text-lg text-[#4682A9] bg-white rounded-lg border-4 border-[#4682A9] focus:ring-black focus:ring-0"
                placeholder="Write the tags name here..." value="{{ $tbl_tags->tags_name }}" required></input>
        </div>
        <div class="py-3">
            <button type="submit"
                class="float-right z-10 px-7 py-2 text-lg md:text-xl font-medium font-concert text-white rounded-full w-fit bg-[#4682A9] hover:bg-[#40779b]">
                Update
            </button>
        </div>
    </form>
</div>


<style>
* {
    z-index: 50;
}

.post {
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: #316a72;
}
</style>
@endsection