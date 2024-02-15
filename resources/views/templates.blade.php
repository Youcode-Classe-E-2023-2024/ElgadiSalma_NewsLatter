@extends('layout')

@section('content')

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

        <form action="{{ route('edit.template', $new->id) }}" class="flex gap-10 w-full" method="POST">
        @csrf
        <div class="bg-white shadow-lg rounded-md p-4 hover:bg-gradient-to-r hover:from-red-50 hover:to-sky-50 w-full flex flex-col">
            <input class="font-bold text-xl pb-4" placeholder=" {{$new['title'] }} " value=" {{$new['title'] }}" name="title"/>
            <input
            placeholder="{{ $new['description'] }} " value="{{ $new['description'] }} "  name="description"          
            />
        </div>

        {{-- edit --}}
        @if (auth()->user()->hasPermission('can-edit'))
        <div class="flex justify-center md:justify-end ">
            <div class="w-[120px] h-[120px] bg-white flex flex-col shadow-lg rounded-xl p-4 flex justify-center items-center">
                <button class="flex p-4 bg-green-500 rounded-xl hover:rounded-2xl hover:bg-green-600 transition-all duration-300 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </button>
            </div>
        </div>
        </form>
        @endif


        {{-- delete --}}
        @if (auth()->user()->hasPermission('can-delete'))
        <form action="{{ route('delete.template', $new->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-center md:justify-end h-full">
                <div class="w-[120px] h-[120px] bg-white flex flex-col shadow-lg rounded-xl p-4 flex justify-center items-center">
                    <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    </button>
                </div>
            </div>
        </form>
        @endif
        
    </div>
    @empty
        <p>No news Found</p>
    @endforelse


</div>

 
@endsection
