<div class="mt-8">
    <a href="{{ route('movies.show', $movie['id'])}}">
        <img class="hover:opacity-75 transition ease-in-out duration-150"
            src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}"
            alt="poster">
    </a>
    <div class="mt-2">
        <a href="{{ route('movies.show', $movie['id'])}}" class="text-lg mt-2 hover:text-gray-300">
            {{ $movie['title'] }}
        </a>
        <div class="flex item-center text-gray-400 mt-1">
            <span class="text-orange-600 pr-2 mt-1 mb-2">
                <i class="fa fa-star" aria-hidden="true"></i>
            </span>
            <span
                class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
            <span class="mx-2">|</span>
            <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('d M, Y') }}</span>
        </div>
        <div class="text-gray-400 text-sm">
            @foreach($movie['genre_ids'] as  $genre)
                {{ $genres->get($genre) }} @if(!$loop->last) , @endif
            @endforeach
        </div>
    </div>
</div>