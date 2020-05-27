@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row ">
            <img src="{{ $movie['poster_path'] }}" class="w-64 md:w-96">
            <div class="md:ml-24">
                <h2 class=" text-4xl font-semibold">{{$movie['title'] }}</h2>
                <div class="flex items-center text-gray-400">
                    <i class="fas fa-star bg-red-500"></i>
                    <span class="ml-1">{{$movie['vote_average']}}</span>
                    <span class="mx-2"> | </span>
                    <span>{{$movie['release_date']}}</span>
                    <span class="mx-2"> | </span>
                    <span>{{$movie['genres']}}</span>
                </div>
                <p class=" text-gray-300 mt-8 text-justify">
                    {{$movie['overview'] }}
                </p>
                <div class="mt-12">
                    <h4 class=" text-white font-semibold">Featured cast</h4>
                    <div class=" flex mt-4">

                        @foreach ($movie['crew'] as $crew)  
                            <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class=" text-sm text-gray-400">{{$crew['job']}}</div>
                            </div>
                        @endforeach

                    </div>
                </div>
                    <div x-data="{isOpen: false}">
                        @if (count($movie['videos']['results']) > 0)
                            <div class="mt-12">
                                <button
                                @click="isOpen = true"
                                 class="flex items-center bg-red-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-red-600">
                                    {{-- <a href="https://www.youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}"> --}}
                                        <i class="fas fa-play-circle"> Play Trailer</i>
                                    {{-- </a> --}}
                                </button>
                            </div>
                        @endif
                        {{-- Youtube video modal --}}
                        <div 
                        x-show="isOpen"
                         style="background-color: rgba(0,0,0,0.5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                        @click="isOpen = false"
                                        class=" text-3xl leading-none hover:text-gray-300">&times;</button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top:56.25%"> 
                                            <iframe width="560" height="315" 
                                            class=" responsive-iframe absolute top-0 left-0 w-full h-full" 
                                            src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" style="border:0;" 
                                            allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div 
    x-data="{isOpen: false, image: ''}"
    class=" border-b border-gray-800">
        <h2 class="text-4xl font-semibold text-center">Cast / Screenshots</h2>
        <div class=" container mx-auto px-4 py-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

            @foreach ($movie['cast'] as $cast)
                
                    <div class="mt-8"> 
                        <a href="{{route('actors.show', $cast['id'])}}">
                            <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" class="hover:opacity-75">
                        </a>
                        <div class="mt-6 text-gray-600">{{$cast['name']}}</div>
                        <h2>As</h2>
                        <div class="text-gray-500">{{$cast['character']}}</div>
                    </div>
               
            @endforeach

            @foreach ($movie['images'] as $image)
                
                    <div class="mt-8">
                        <a href="{{route('actors.show', $cast['id'])}}"
                        @click.prevent="
                        isOpen = true
                        image='{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'">
                            <img src="{{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" class="hover:opacity-75">
                        </a>
                    </div>
              
            @endforeach
            
        </div>
            {{-- Youtube video modal --}}
            <div 
            x-show="isOpen"
             style="background-color: rgba(0,0,0,0.5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                            @click="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            class=" text-3xl leading-none hover:text-gray-300">&times;</button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img 
                            :src="image">
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
