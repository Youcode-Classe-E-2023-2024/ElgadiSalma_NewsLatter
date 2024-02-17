@if (auth()->user()->hasRole('auteur'))

@extends('layout')

@section('content')
@if (auth()->user()->hasPermission('can-create'))


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
                <label for="media" class="mb-3 block text-base font-medium ">
                    Media 
                </label>
                <div class="rounded-md border border-[#e0e0e0] p-1 outline-none flex">
                    <input type="text" id="selectedMedia" name="media" placeholder="Media" class="rounded w-full pb-2 py-2 px-3 placeholder-gray-500 outline-none" style="width: 35rem;">   
                    <div class="absolute max-h-40 mt-12 z-10 mt-2 bg-white border border-gray-300 rounded-md shadow-lg  hidden" id="dropdownContent">
                        @foreach ($medias as $media)
                            @foreach ($media->getMedia() as $mediaItem)                  
                                <div class="title bg-gray-100 border p-2 border-gray-300 w-full outline-none">
                                    <label>
                                        @if ($mediaItem->type == 'image')
                                            <img src="{{ $mediaItem->getUrl() }}" alt='' class="h-20 w-full object-cover object-center inline-block mr-2" onclick="selectMedia('{{ $mediaItem->getUrl() }}')">                     
                                        @elseif($mediaItem->type == 'video')
                                            <video controls class="h-24 w-full" onclick="selectMedia('{{ $mediaItem->getUrl() }}')">
                                                <source src="{{ $mediaItem->getUrl() }}" type="video/mp4">
                                            </video>
                                        @endif
                                    </label>
                                </div>                          
                            @endforeach
                        @endforeach
                    </div> 
                    <div class="m-2">
                        <button type="button" onclick="toggleDropdown()">^_^</button>
                    </div>           
                </div>
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

@endif
<script>
  function toggleDropdown()
  {
        var dropdown = document.getElementById('dropdownContent');
        dropdown.classList.toggle('hidden');
  }

  function selectMedia(url) 
  {
      var selectedMediaInput = document.getElementById("selectedMedia");
      selectedMediaInput.value = url;
      toggleDropdown();
  }

</script>
@endsection
@endif
