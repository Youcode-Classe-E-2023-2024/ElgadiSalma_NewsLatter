@if(auth()->check() && auth()->user()->role === 0)
@extends('layout')

@section('content')

<div class="flex flex-col items-center">
    <h1 class="text-4xl text-purple-500 pt-20 text-center font-bold">Média</h1>
    


    <form class="w-full max-w-lg m-4 pt-5" method="POST" action="{{route('add.media')}}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Image
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="photo" type="file">
            <p class="text-gray-600 text-xs italic">Some tips - as long as needed</p>
          </div>
        </div>
        <div class="">
          <div class="w-full">
            <button type="submit" class="bg-purple-400 py-2 px-4 rounded w-full border-2" type="button">
              Save
            </button>
          </div>
          <div class="md:w-2/3"></div>
        </div>
      </form>



    <div class='w-full gap-2 flex flex-wrap justify-center m-10'>
        <div></div>

        @forelse ($medias as $media)

            <div key={content} class="group relative rounded-lg overflow-hidden bg-white  hover:shadow-2xl border-2">
                @if ($media->type === 'image')
                <div class=" p-4 ">
                    <img
                        src="{{ asset('storage/media/images/' . $media->photo) }}"
                        alt='City'
                        class="h-72 w-full object-cover object-center "
                    />
                </div>
                
                @elseif ($media->type === 'video')
                <div class=" p-4 ">
                    <video controls class="h-72 w-full object-cover object-center">
                        <source src="{{ asset('storage/media/videos/' . $media->photo) }}" type="video/mp4">
                    </video>
                </div>
                @endif
                    <p class="text-sm font-bold text-orange-500 text-center">{{ $media['photo'] }}</p>

                    <div class="w-full">
                        <form action="{{ route('delete.media', $media->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="supprimer" class="w-full bg-black px-5 py-2 font-semibold text-gray-500 duration-75 hover:bg-gray-700 hover:text-purple-100">Supprimer</button>
                        </form>
                    </div>
                
            </div>
            @empty
                <p>No media Found</p>
            @endforelse

            <div></div>
        </div>
    </div>

@endsection
@endif


