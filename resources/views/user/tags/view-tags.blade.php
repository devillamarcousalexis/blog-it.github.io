@extends('user.layouts.user-layout')

@section('content')

<div class="p-10 md:p-20 grid grid-cols-1 gap-10 bg-[#91C8E4]">

    <div class="grid grid-cols-2 gap-0 items-center justify-between bg-transparent">
        <div class="bg-transparent">
            <p class="text-3xl md:text-5xl w-fit bg-transparent font-bold  text-white font-concert px-0">Tags</p>
        </div>
        <div class="bg-transparent">
            <a type="button" href="{{ route('tags.create') }}" class="bg-[#004AAD] w-fit grid float-right p-3 rounded-xl text-md md:text-md font-concert text-white hover:bg-blue-900">Add
                New
                Tag</a>
        </div>
    </div>
    @foreach($tbl_tags as $data)
    <div class="flex flex-col border-4 border-[#4682A9] text-lg bg-white font-concert text-[#4682A9] pt-5 pl-10 pr-10 pb-10 rounded-lg ">
        <div class="flex justify-end items-start bg-white">
            <a href="{{ route('tags.edit', $data->tags_id) }}" class="bg-white text-blue-500 rounded-full px-2 ">
                <svg class="w-6 h-6 text-gray-800 bg-white dark:text-white hover" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="green" viewBox="0 0 20 18">
                    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                </svg>
            </a>
            <form method="POST" action="{{ route('tags.destroy', $data->tags_id) }}" style="background-color: white; display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" href="{{ route('tags.destroy', $data->tags_id) }}" class="bg-white rounded-full text-red-500">
                    <svg class="w-6 h-6 text-gray-800 bg-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 18 20">
                        <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="flex flex-col w-full bg-white">
            <div class="h-fit">
                <p class="text-lg md:text-xl font-bold bg-white px-0 py-2">{{ $data->tags_name }}</p>
            </div>
            <div class="fixed-height">
                <p class="bg-white px-0 text-sm text-gray-400">Posted on
                    {{ $data->created_at->format('F d, Y \a\t h:ia') }}</p>
            </div>
        </div>
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