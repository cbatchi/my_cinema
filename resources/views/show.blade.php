@extends('layout.main')

@section('content')

  <div class="movie-infos border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
      <div class="flex-none">
        <img class="w-64 md:w-96" src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" style="width: 24rem" alt="">
      </div>

      <!-- Debut de info -->
      <div class="md:ml-20">
        <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
        <div class="flex flex-wrap item-center text-gray-400 mt-2">
          <span class="text-orange-600 pr-2">
            <i class="fa fa-star" aria-hidden="true"></i>
          </span>
          <span class="ml-1">
            {{ $movie['vote_average'] * 10 . '%' }}
          </span>
          <span class="mx-2">|</span>
          <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('d M, Y') }}</span>
          <span class="mx-2">|</span>
          <span>
            @foreach($movie['genres'] as  $genre)
              {{ $genre['name'] }} @if(!$loop->last) , @endif
            @endforeach
          </span>
        </div>

        <p class="text-gray-300 mt-8">{{ $movie['overview'] }}</p>
        <div class="mt-12">
          <h4 class="text-white font-semibold">Featured Crew</h4>
          <div class="flex mt-4">
            @foreach ($movie['credits']['crew'] as $crew )
              @if($loop->index < 5)
                <div class="mr-8">
                  <h3>{{ $crew['name'] }}</h3>
                  <p class="text-sm text-gray-400 mt-2">{{ $crew['job'] }}</p>
                </div>
              @endif
            @endforeach
          </div>
        </div>

        <div x-data="{ isOpen: false }">
          @if(count($movie['videos']['results']) > 0)
            <div class="mt-12">

              <button href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"
                @click="isOpen = true"
                target="_blank"
                class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
              >
                <i class="fa fa-play-circle w-6 text-2xl" aria-hidden="true"></i>
                <span class="ml-2">Play Trailer</span>
              </button>
            </div><!-- Fin de info -->
          @endif

          <template x-if="isOpen">
            <div
              style="background-color: rgba(0, 0, 0, .5);"
              class="absolute top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            >
              <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                <div class="bg-gray-900 rounded">
                  <div class="flex justify-end pr-4 pt-2">
                    <button
                      @click="isOpen = false"
                      @keydown.escape.window="isOpen = false"
                      class="text-3xl leading-none hover:text-gray-300">&times;
                    </button>
                  </div>
                  <div class="modal-body px-8 py-8">
                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                      <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>

    <!-- Debut de casting -->
    <div class="movie-cast border-b border-gray-800">
      <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Casting</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8">

          @foreach ($movie['credits']['cast'] as $cast)
            @if ($loop->index < 10)
              <div class="mt-8">
                <a href="src="{{ 'https://image.tmdb.org/t/p/w500/' . $cast['profile_path'] }}">
                  <img class="hover:opacity-75 transition ease-in-out duration-150" src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}" alt="affiche film">
                </a>
                <div class="mt-2">
                  <h3 class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</h3>
                  <div class="text-gray-400 text-sm">{{ $cast['character'] }}</div>
                </div>
              </div>
            @endif
          @endforeach

        </div>
      </div>
    </div>
    <!-- Fin de casting -->

    <div class="movie-cast border-b border-gray-800"><!-- Image de movie -->
      <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-8">
          @foreach ($movie['images']['backdrops'] as $image )
            @if ($loop->index < 6)
              <div class="mt-8">
                <a href="">
                  <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="">
                </a>
              </div>
            @endif
          @endforeach
      </div>
    </div><!-- Fin image de movie -->

  </div>

@endsection