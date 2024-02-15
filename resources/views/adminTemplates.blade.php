@if (auth()->user()->hasRole('admin'))

@extends('layout')

@section('content')

{{-- all templates --}}

<h1 class="text-4xl text-purple-500 py-20 text-center font-bold">Templates</h1>

<div class="max-w-6xl mx-auto flex flex-col gap-10 px-5">

@forelse ($news as $new)
    <div class="flex flex-col md:flex-row bg-white  rounded-xl md:bg-transparent shadow-lg shadow-black/20 md:shadow-none gap-10">
        <div class="flex justify-center md:justify-end">
            <div class="w-[120px] h-[120px] bg-white flex flex-col shadow-lg rounded-xl p-4 flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14 text-blue-950">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                </svg>
                <h1 class="text-base font-bold text-[#6B7280] pt-2">salma</h1>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-md p-4 hover:bg-gradient-to-r hover:from-red-50 hover:to-sky-50 w-full flex flex-col">
            <input class="font-bold text-xl pb-4" placeholder=" {{$new['title'] }} " value=" {{$new['title'] }}" name="title"/>
            <input
            placeholder="{{ $new['description'] }} " value="{{ $new['description'] }} "  name="description"          
            />
        </div>

        {{-- send --}}
        <form action="{{ route('send.newsletter', $new->id) }}" method="POST">
            @csrf
            <div class="flex justify-center md:justify-end h-full">
                <div class="w-[120px] h-[120px] bg-white flex flex-col shadow-lg rounded-xl p-4 flex justify-center items-center">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14 text-blue-950">
                            <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>

    </div>
    @empty
        <p>No Templates Found</p>
    @endforelse


</div>

{{-- end all templates  --}}


{{-- deleted templates --}}
<h1 class="text-4xl text-purple-500 py-20 text-center font-bold">Deleted Templates</h1>

<div class="max-w-6xl mx-auto flex flex-col gap-10 px-5">

@forelse ($deletedNews as $deletedNew)
    <div class="flex flex-col md:flex-row bg-white  rounded-xl md:bg-transparent shadow-lg shadow-black/20 md:shadow-none gap-10">
        <div class="flex justify-center md:justify-end">
            <div class="w-[120px] h-[120px] bg-white flex flex-col shadow-lg rounded-xl p-4 flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14 text-blue-950">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                </svg>
                <h1 class="text-base font-bold text-[#6B7280] pt-2">salma</h1>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-md p-4 hover:bg-gradient-to-r hover:from-red-50 hover:to-sky-50 w-full flex flex-col">
            <input class="font-bold text-xl pb-4" placeholder=" {{$deletedNew['title'] }} " value=" {{$deletedNew['title'] }}" name="title"/>
            <input
            placeholder="{{ $deletedNew['description'] }} " value="{{ $deletedNew['description'] }} "  name="description"          
            />
        </div>

        {{-- restore --}}
        <form action="{{ route('restore.template', $deletedNew->id) }}" method="POST">
            @csrf
            <div class="flex justify-center md:justify-end h-full">
                <div class="w-[120px] h-[120px] bg-white flex flex-col shadow-lg rounded-xl p-4 flex justify-center items-center">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14 text-green-500">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm.53 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v5.69a.75.75 0 001.5 0v-5.69l1.72 1.72a.75.75 0 101.06-1.06l-3-3z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>

    </div>
    @empty
        <p>No deleted Templates Found</p>
    @endforelse


</div>


@endsection
@endif