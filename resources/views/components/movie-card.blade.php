<div class="mt-8"> 
<a href="{{route('movies.show', $movie['id'])}}">
        <img src="{{$movie['poster_path'] }}" class="hover:opacity-75">
    </a>
    <div class="mt-2">
    <a href="{{route('movies.show', $movie['id'])}}" class="text-lg mt-2 hover:text-gray-500">{{$movie['title']}}</a>
        <div class="flex items-center text-gray-400">
            <i class="fas fa-star bg-red-500"></i>
            <span class="ml-1">{{$movie['vote_average']}}</span>
            <span class="mx-2"> | </span>
            <span>{{$movie['release_date']}}</span>
        </div>
        <div class="flex text-gray-500 text-sm">
            {{$movie['genres']}}
        </div>
    </div>
</div>