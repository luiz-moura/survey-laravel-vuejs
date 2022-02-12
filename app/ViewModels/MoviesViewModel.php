<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public function __construct(
        public $popularMovies,
        public $nowPlayingMovies,
        public $genres,
    ) {
        //
    }

    public function popularMovies()
    {
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies()
    {
        return $this->formatMovies($this->nowPlayingMovies);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatMovies($movies)
    {
        return collect($movies)->recursive()->map(function ($movie) {
            $genresFormatted = $movie['genre_ids']->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return $movie->merge([
                'poster_path' => "http://image.tmdb.org/t/p/w500{$movie['poster_path']}",
                'vote_average' => ($movie['vote_average'] * 10) . '%',
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path',
                'id',
                'genre_ids',
                'title',
                'vote_average',
                'overview',
                'release_date',
                'genres',
            ]);
        });
    }
}
