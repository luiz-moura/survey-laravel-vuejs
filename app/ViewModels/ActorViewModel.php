<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public function __construct(
        public $actor,
        public $social,
        public $credits,
    )
    {
        //
    }

    public function actor()
    {
        return collect($this->actor)->merge([
            'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age,
            'profile_path' => $this->actor['profile_path']
                ? "https://image.tmdb.org/t/p/w300{$this->actor['profile_path']}"
                : 'https://via.placeholder.com/300x458',
        ]);
    }

    public function social()
    {
        return collect($this->social)->merge([
            'twitter' => $this->social['twitter_id']
                ? "https://twitter.com/{$this->social['twitter_id']}"
                : null,
            'facebook' => $this->social['facebook_id']
                ? "https://facebook.com/{$this->social['facebook_id']}"
                : null,
            'instagram' => $this->social['instagram_id']
                ? "https://instagram.com/{$this->social['instagram_id']}"
                : null,
        ]);
    }

    public function knownForMovies()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->recursive()->where('media_type', 'movie')->sortByDesc('popularity')->take(5)
            ->map(function ($movie) {
                return $movie->merge([
                    'poster_path' => $movie['poster_path']
                        ? "https://image.tmdb.org/t/p/w185{$movie['poster_path']}"
                        : 'https://via.placeholder.com/185x278',
                    'title' => $movie['title'] ?? 'Untitled',
                ]);
            });
    }

    public function credits()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->recursive()->map(function ($movie) {
            $releaseDate = $movie['release_date'] ?? $movie['first_air_date'] ?? '';
            $title = $movie['title'] ?? $movie['name'] ?? 'Untitled';

            return $movie->merge([
                'release_date' => $releaseDate,
                'release_year' => !empty($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future',
                'title' => $title,
                'character' =>  !empty($movie['character']) ? $movie['character'] : 'unknown',
            ]);
        })->sortByDesc('release_date');
    }
}
