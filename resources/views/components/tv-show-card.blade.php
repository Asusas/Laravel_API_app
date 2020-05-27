<div class="mt-8"> 
    <a href="{{route('shows.show', $tvShow['id'])}}">
        <img src="{{$tvShow['poster_path'] }}" class="hover:opacity-75">
    </a>
    <div class="mt-2">
    <a href="{{route('shows.show', $tvShow['id'])}}" class="text-lg mt-2 hover:text-gray-500">{{$tvShow['name']}}</a>
        <div class="flex items-center text-gray-400">
            <i class="fas fa-star bg-red-500"></i>
            <span class="ml-1">{{$tvShow['vote_average']}}</span>
            <span class="mx-2"> | </span>
            <span>{{$tvShow['first_air_date']}}</span>
        </div>
        <div class="flex text-gray-500 text-sm">
            {{$tvShow['genres']}}
        </div>
    </div>
</div>