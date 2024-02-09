@if(auth()->check() && auth()->user()->role === 0)
@extends('layout')

@section('content')

<div class="flex flex-col items-center">
    <h1 class="text-4xl text-purple-500 pt-20 text-center font-bold">Média</h1>
    
        <div class="w-1/2 my-20 ">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <ul class="divide-y divide-gray-200 gap-3">
    
                    @forelse ($medias as $media)
    
                    
                    @empty
                        <p>No media Found</p>
                    @endforelse
                    
                </ul>
            </div>
        </div>
    </div>

@endsection
@endif