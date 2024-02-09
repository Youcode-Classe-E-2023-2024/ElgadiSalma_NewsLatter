@if(auth()->check() && auth()->user()->role === 0)
@extends('layout')

@section('content')

<div class="flex flex-col items-center">
<h1 class="text-4xl text-purple-500 pt-20 text-center font-bold">Subscribers</h1>

    <div class="w-1/2 my-20 ">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <ul class="divide-y divide-gray-200 gap-3">

                @forelse ($subscribers as $subscriber)

                <li class="p-3 flex justify-between items-center">
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full" src="https://unsplash.com/photos/oh0DITWoHi4/download?force=true&w=640" alt="Christy">
                        <span class="ml-3 font-medium">{{ $subscriber['email'] }}</span>
                    </div>
                    <div>
                        <form action="{{ route('delete.subscriber', $subscriber->id ) }}" method="post" class="w-1/2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="supprimer" class="bg-black rounded-md px-5 py-2 font-semibold text-gray-500 duration-75 hover:bg-gray-700 hover:text-purple-100">Supprimer</button>
                        </form>
                    </div>
                </li>

                @empty
                    <p>No subscriber Found</p>
                @endforelse
                
            </ul>
        </div>
    </div>
</div>


@endsection
@endif