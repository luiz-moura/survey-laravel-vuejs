<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public function __construct(public $movie)
    {
        $this->movie = collect($this->movie)->recursive();
    }

    public function movie()
    {
        return $this->movie->merge([
            'poster_path' => "http://image.tmdb.org/t/p/w500{$this->movie['poster_path']}",
            'vote_average' => ($this->movie['vote_average'] * 10) . '%',
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => $this->movie['genres']->pluck('name')->flatten()->implode(', '),
            'crew' => $this->movie['credits']['crew']->take(2),
            'cast' => $this->movie['credits']['cast']->take(5)->map(function ($cast) {
                return $cast->merge([
                    'profile_path' => $cast['profile_path']
                        ? "https://image.tmdb.org/t/p/w300{$cast['profile_path']}"
                        : 'https://via.placeholder.com/300x450',
                ]);
            }),
            'images' => $this->movie['images']['backdrops']->take(9),
        ])->only([
            'poster_path',
            'id',
            'genres',
            'title',
            'vote_average',
            'overview',
            'release_date',
            'credits',
            'videos',
            'images',
            'crew',
            'cast',
        ]);
    }
}
