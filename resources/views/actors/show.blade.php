@extends('layouts.main')

@section('content')
  <div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
      <div class="flex-none">
        <img src="{{ $actor['profile_path'] }}" alt="profile image" class="w-76">
        <ul class="flex items-center mt-4">
          @if ($actor['homepage'])
            <li class="mr-2">
              <a href="{{ $actor['homepage'] }}" title="Facebook">
                <span class="fill-current text-gray-400 hover:text-white w-6">
                  <i class="fas fa-globe-europe"></i>
                </span>
              </a>
            </li>
          @endif
          @if ($social['facebook'])
            <li class="mr-2">
              <a href="{{ $social['facebook'] }}" title="Facebook" class="fill-current text-gray-400 hover:text-white w-6">
                <span class="fill-current text-gray-400 hover:text-white w-6">
                  <i class="fab fa-facebook-square"></i>
                </span>
              </a>
            </li>
          @endif
          @if ($social['instagram'])
            <li class="mr-2">
              <a href="{{ $social['instagram'] }}" title="Instagram" class="fill-current text-gray-400 hover:text-white w-6">
                <span class="fill-current text-gray-400 hover:text-white w-6">
                  <i class="fab fa-instagram-square"></i>
                </span>
              </a>
            </li>
          @endif
          @if ($social['twitter'])
            <li class="mr-2">
              <a href="{{ $social['twitter'] }}" title="Twitter" class="fill-current text-gray-400 hover:text-white w-6">
                <span class="fill-current text-gray-400 hover:text-white w-6">
                  <i class="fab fa-twitter-square"></i>
                </span>
              </a>
            </li>
          @endif
        </ul>
      </div>
      <div class="md:ml-24">
        <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $actor['name'] }}</h2>
        <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
          <span class="fill-current text-gray-400 hover:text-white w-4">
            <i class="fas fa-birthday-cake"></i>
          </span>
          <span class="ml-2">{{ $actor['birthday'] }} ({{ $actor['age'] }} years old) in {{ $actor['place_of_birth'] }}</span>
        </div>

        <p class="text-gray-300 mt-8">
          {{ $actor['biography'] }}
        </p>

        <h4 class="font-semibold mt-12">Known For</h4>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
          @foreach ($knownForMovies as $movie)
            <div class="mt-4">
              <a href="{{ route('movies.show', $movie['id']) }}">
                <img src="{{ $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
              </a>
              <a href="#" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                {{ $movie['title'] }}
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div><!-- end movie-info -->

  <div class="credits border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
      <h2 class="text-4xl font-semibold">Credits</h2>
      <ul class="list-disc leading-loose pl-5 mt-8">
        @foreach ($credits as $credit)
          <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}</li>
        @endforeach
      </ul>
    </div>
  </div><!-- end credits -->

@endsection
