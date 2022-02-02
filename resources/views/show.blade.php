@extends('layouts.main')

@section('content')
  <div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
      <img src="/img/parasite.jpg" alt="parasite" class="w-64 md:w-96">
      <div class="md:ml-24">
        <h2 class="text-4xl font-semibold">Parasite (2019)</h2>
        <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
          <span>
            <i class="fill-current text-orange-500 fas fa-star"></i>
          </span>
          <span class="ml-1">85%</span>
          <span class="mx-2">|</span>
          <span>Feb 20, 2020</span>
          <span class="mx-2">|</span>
          <span>Action, Thriller, Drama</span>
        </div>

        <p class="text-gray-300 mt-8">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quia assumenda dolorum illo ullam fugit ratione, doloribus fugiat quam non deserunt alias cumque, quidem tempore maiores perferendis harum consectetur laborum veritatis dolor nesciunt temporibus quo nemo perspiciatis. Maiores, officia, veritatis, cum nisi aliquam exercitationem nobis quo error ipsa pariatur eligendi.
        </p>

        <div class="mt-12">
          <h4 class="text-white font-semibold">Featured Cast</h4>
          <div class="flex mt-4">
            <div>
              <div>Bong Joon-he</div>
              <div class="text-sm text-gray-400">Screenplay, Director, Story</div>
            </div>
            <div class="ml-8">
              <div>Han Jin-won</div>
              <div class="text-sm text-gray-400">Screenplay</div>
            </div>
          </div>
        </div>

        <div class="mt-12">
          <button class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
            <i class="w-6 fill-current far fa-play-circle"></i>
            <span class="ml-2">Play trailer</span>
          </button>
        </div>
      </div>
    </div>
  </div><!-- end movie-info -->

  <div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
      <h2 class="text-4xl font-semibold">Cast</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
        <div class="mt-8">
          <a href="#">
            <img src="/img/actor.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
          <div class="mt-2">
            <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
            <div class="text-gray-400 text-sm">
              John Smith
            </div>
          </div>
        </div>
        <div class="mt-8">
          <a href="#">
            <img src="/img/actor.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
          <div class="mt-2">
            <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
            <div class="text-gray-400 text-sm">
              John Smith
            </div>
          </div>
        </div>
        <div class="mt-8">
          <a href="#">
            <img src="/img/actor.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
          <div class="mt-2">
            <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
            <div class="text-gray-400 text-sm">
              John Smith
            </div>
          </div>
        </div>
        <div class="mt-8">
          <a href="#">
            <img src="/img/actor.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
          <div class="mt-2">
            <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
            <div class="text-gray-400 text-sm">
              John Smith
            </div>
          </div>
        </div>
        <div class="mt-8">
          <a href="#">
            <img src="/img/actor.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
          <div class="mt-2">
            <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
            <div class="text-gray-400 text-sm">
              John Smith
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- end movie-cast -->

  <div class="movie-images">
    <div class="container mx-auto px-4 py-16">
      <h2 class="text-4xl font-semibold">Images</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        <div class="mt-8">
          <a href="#">
            <img src="/img/image.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
        </div>
        <div class="mt-8">
          <a href="#">
            <img src="/img/image.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
        </div>
        <div class="mt-8">
          <a href="#">
            <img src="/img/image.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
        </div>
        <div class="mt-8">
          <a href="#">
            <img src="/img/image.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
        </div>
        <div class="mt-8">
          <a href="#">
            <img src="/img/image.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
          </a>
        </div>
      </div>
    </div>
  </div><!-- end movie-images -->

@endsection
