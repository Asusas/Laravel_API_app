@extends('layouts.main')


@section('content')
    <div class=" container mx-auto px-4 pt-16">
        <div class="pop-movies">
            <h2 class=" uppercase tracking-wider text-orange-500 text-lg font-semibold">popular shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach ($popShows as $tvShow)
                    <x-tvShow-card :tvShow="$tvShow"/>
                @endforeach

            </div>
        </div>

        <hr class="mt-3">

        <div class="pop-movies">
            <h2 class=" uppercase tracking-wider text-orange-500 text-lg font-semibold">top rated shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach ($topRated as $tvShow)
                    <x-tvShow-card :tvShow="$tvShow"/>
                @endforeach

            </div>
        </div>
    </div>
@endsection