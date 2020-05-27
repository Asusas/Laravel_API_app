<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popMovies;
    public $nowPlaying;
    public $genres;

    public function __construct($popMovies, $nowPlaying, $genres)
    {
        $this->popMovies = $popMovies;
        $this->nowPlaying = $nowPlaying;
        $this->genres = $genres;

    }

    public function popMovies()
    {
        return $this->formatMovies($this->popMovies);
    }

    public function nowPlaying()
    {
        return $this->formatMovies($this->nowPlaying);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatMovies($movies)
    {

        // @foreach ($movie['genre_ids'] as $genre)
        //         {{$genres->get($genre)}} @if (!$loop->last), @endif
        //     @endforeach

        return collect($movies)->map(function ($movie) {

            $genresFormated = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            });

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . '%',
                'release_date' => Carbon::parse($movie['release_date'])->format('M d , Y'),
                'genres' => $genresFormated->implode(', '),
            ]);
        });
    }
}