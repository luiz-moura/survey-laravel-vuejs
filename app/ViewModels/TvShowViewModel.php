<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public function __construct(public $tvshow)
    {
        $this->tvshow = collect($this->tvshow)->recursive();
    }

    public function tvshow()
    {
        return collect($this->tvshow)->recursive()->merge([
            'poster_path' => "http://image.tmdb.org/t/p/w500{$this->tvshow['poster_path']}",
            'vote_average' => ($this->tvshow['vote_average'] * 10) . '%',
            'first_air_date' => Carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
            'genres' => $this->tvshow['genres']->pluck('name')->flatten()->implode(', '),
            'crew' => $this->tvshow['credits']['crew']->take(2),
            'cast' => $this->tvshow['credits']['cast']->take(5)->map(function ($cast) {
                return $cast->merge([
                    'profile_path' => $cast['profile_path']
                        ? "https://image.tmdb.org/t/p/w300{$cast['profile_path']}"
                        : 'https://via.placeholder.com/300x450',
                ]);
            }),
            'images' => $this->tvshow['images']['backdrops']->take(9),
        ])->only([
            'poster_path',
            'id',
            'genres',
            'name',
            'vote_average',
            'overview',
            'first_air_date',
            'credits',
            'videos',
            'images',
            'crew',
            'cast',
            'created_by'
        ]);
    }
}
