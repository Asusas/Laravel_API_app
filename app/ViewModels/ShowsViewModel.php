<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Spatie\ViewModels\ViewModel;

class ShowsViewModel extends ViewModel
{
    public $popShows;
    public $topRated;
    public $genres;

    public function __construct($popShows, $topRated, $genres)
    {
        $this->popShows = $popShows;
        $this->topRated = $topRated;
        $this->genres = $genres;

    }

    public function popShows()
    {
        return $this->formatShows($this->popShows);
    }

    public function topRated()
    {
        return $this->formatShows($this->topRated);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatShows($shows)
    {
        // return collect($shows)->map(function ($TVshow) {
        //     return $TVshow;
        // })->dump();

        return collect($shows)->map(function ($TVshows) {

            $genresFormated = collect($TVshows['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            });

            return collect($TVshows)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $TVshows['poster_path'],
                'vote_average' => $TVshows['vote_average'] * 10 . '%',
                'first_air_date' => Carbon::parse($TVshows['first_air_date'])->format('M d , Y'),
                'genres' => $genresFormated->implode(', '),
            ]);
        });
    }
}