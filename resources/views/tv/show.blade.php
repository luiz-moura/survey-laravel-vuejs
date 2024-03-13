@extends('layouts.main')

@section('content')
  <div class="tv-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
      <div class="flex-none">
        <img src="{{ $tvshow['poster_path'] }}" alt="tvshow" class="w-64 lg:w-96">
      </div>
      <div class="md:ml-24">
        <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $tvshow['name'] }}</h2>
        <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
          <span>
            <i class="fill-current text-orange-500 fas fa-star"></i>
          </span>
          <span class="ml-1">{{ $tvshow['vote_average'] }}</span>
          <span class="mx-2">|</span>
          <span>{{ $tvshow['first_air_date'] }}</span>
          <span class="mx-2">|</span>
          <span>{{ $tvshow['genres'] }}</span>
        </div>
        <p class="text-gray-300 mt-8">
          {{ $tvshow['overview'] }}
        </p>
        <div class="mt-12">
          <div class="flex mt-4">
            @foreach ($tvshow['created_by'] as $crew)
              <div class="mr-8">
                <div>{{ $crew['name'] }}</div>
                <div class="text-sm text-gray-400">Creator</div>
              </div>
            @endforeach
          </div>
        </div>
        <div x-data="{ isOpen: false }">
          @if (count($tvshow['videos']['results']) > 0)
            <div class="mt-12">
              <button
                x-on:click="isOpen = true"
                class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
              >
                <i class="w-6 fill-current far fa-play-circle"></i>
                <span class="ml-2">Play trailer</span>
              </button>
            </div>
          @endif
          <div
            style="background-color: rgba(0, 0, 0, .5);"
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            x-show="isOpen"
            x-transition
          >
            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
              <div class="bg-gray-900 rounded">
                <div class="flex justify-end pr-4 pt-2">
                  <button x-on:click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                </div>
                <div class="modal-body px-8 py-8">
                  <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                    <iframe
                      width="560"
                      height="315"
                      class="responsive-iframe absolute top-0 left-0 w-full h-full"
                      src="https://youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}"
                      style="border: 0;"
                      allow="autoplay; encrypted-media"
                      frameborder="0"
                      allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- end tv-info -->

  <div class="tv-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
      <h2 class="text-4xl font-semibold">Cast</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
        @foreach ($tvshow['cast'] as $cast)
          <div class="mt-8">
            <a href="{{ route('actors.show', $cast['id']) }}">
              <img src="{{ "https://image.tmdb.org/t/p/w300{$cast['profile_path']}" }}" alt="character" class="hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="mt-2">
              <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
              <div class="text-gray-400 text-sm">
                {{ $cast['character'] }}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div><!-- end tv-cast -->

  <div class="tv-images" x-data="{ isOpen: false, image: ''}">
    <div class="container mx-auto px-4 py-16">
      <h2 class="text-4xl font-semibold">Images</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @foreach ($tvshow['images'] as $image)
          <div class="mt-8">
            <a
              x-on:click.prevent="
                isOpen = true
                image = '{{ "https://image.tmdb.org/t/p/original{$image["file_path"]}" }}'
              "
              href="#"
            >
              <img src="{{ "https://image.tmdb.org/t/p/w500{$image["file_path"]}" }}" alt="image" class="hover:opacity-75 transition ease-in-out duration-150">
            </a>
          </div>
        @endforeach
      </div>
      <div
        style="background-color: rgba(0, 0, 0, .5);"
        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
        x-show="isOpen"
        x-transition
      >
        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
          <div class="bg-gray-900 rounded">
            <div class="flex justify-end pr-4 pt-2">
              <button
                x-on:click="isOpen = false"
                x-on:keydown.escape.window="isOpen = false"
                class="text-3xl leading-none hover:text-gray-300"
              >
                &times;
              </button>
            </div>
            <div class="modal-body px-8 py-8">
              <img :src="image" alt="">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div><!-- end tv-images -->

@endsection
