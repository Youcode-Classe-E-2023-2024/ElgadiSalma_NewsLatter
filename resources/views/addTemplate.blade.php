@extends('layout')

@section('content')

<div class="text-4xl text-purple-500 pt-20 text-center font-bold">Add Template</div>

<div class="flex items-center justify-center p-12">
  <div class="w-2/3">
    <div class="mx-auto w-full max-w-[550px]">

      <form action="{{ route('addTemplate') }}" method="POST">
        @csrf
        <div class="-mx-3 flex flex-wrap">
          <input type="hidden" name="id" value="">
          <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
              <label for="titre" class="mb-3 block text-base font-medium text-[#07074D]">
                Titre 
              </label>
              <input type="text" name="title" placeholder="Titre" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="">
            </div>
          </div>

          <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
              <label for="media" class="mb-3 block text-base font-medium text-[#07074D]">
                Media 
              </label>
              <select name="media" id="media" class="w-full rounded-md border border-gray-300 text-[#6B7280]" required>
                <option value="" selected disabled>Choisir un média</option>
                @foreach ($medias as $media)
                  @foreach ($media->getMedia() as $mediaItem)                  
                    <option value="{{ $media->id }}">
                      @if ($mediaItem->type == 'image')
                        <img src="{{ $mediaItem->getUrl() }}" alt='' class="h-72 w-full object-cover object-center">
                      @elseif($mediaItem->type == 'video')
                        <video controls class="h-72 w-full object-cover object-center">
                          <source src="{{ $mediaItem->getUrl() }}" type="video/mp4">
                        </video>
                      @endif
                    </option>
                  @endforeach
                @endforeach
                </select>
            </div>
          </div>

        </div>

        <div class="mb-5">
          <label class="mb-3 block text-base font-medium text-[#07074D]">
            Description
          </label>
          <input
            type="text"
            name="description"
            placeholder="Description"
            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            value=""
          />
        </div>

        <div class="my-10">
          <button type="submit" name="submit" class="hover:shadow-form rounded-md bg-gray-100 py-3 px-8 text-center text-base font-semibold w-full border-2 outline-none">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
