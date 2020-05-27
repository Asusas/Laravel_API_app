@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row ">

            <div class=" flex-none">
            <img src="{{$actor['profile_path']}}" class="w-64 md:w-96">
                <ul class="flex items-center mt-4">

                    @if ($social['facebook'])
                        <li class="ml-16">
                            <a href="{{$social['facebook']}}" title="Facebook">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                        </li>
                    @endif
                        
                    @if ($social['instagram'])
                        <li class="ml-16">
                        <a href="{{$social['instagram']}}" title="Instagram">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a>
                        </li>
                    @endif
                                            
                    @if ($social['twitter'])
                        <li class="ml-16">
                        <a href="{{$social['twitter']}}" title="Twitter">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                        </li>
                    @endif
                        
                </ul>
            </div>
            
            <div class="md:ml-24">
            <h2 class=" text-4xl font-semibold">{{$actor['name']}}</h2>
                <div class="flex items-center text-gray-400">
                    <i class="fas fa-birthday-cake"></i>
                <span class="ml-1"> {{$actor['birthday']}} ({{$actor['age']}} years old), {{$actor['place_of_birth']}}</span>
                </div>
                <p class=" text-gray-300 mt-8 text-justify">
                    {{$actor['biography']}}
                </p> 

                <h4 class=" font-semibold mt-12">Known for</h4>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">

                    @foreach ($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{$movie['linkToPage']}}">
                                <img src="{{$movie['poster_path']}}" alt="">
                            </a>
                            <a href="{{$movie['linkToPage']}}">{{$movie['title']}}</a>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
    <div 
    x-data="{isOpen: false, image: ''}"
    class=" border-b border-gray-800">
        <h2 class="text-4xl font-semibold text-center">Credits</h2>
        <div class="list-disc leading-loose pl-24 mt-8">
            <ul>

                @foreach ($credits as $credit)
                    <li>{{$credit['release_year']}} &middot; <strong>{{$credit['title']}}</strong> as {{$credit['character']}}</li>
                @endforeach
    
            </ul>
        </div>
    </div>

@endsection
