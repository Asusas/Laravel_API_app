<div class="relative mt-3 md:mt-0"

 x-data="{isOpen: true}" 
 @click.away="isOpen = false">

    <input wire:model.debounce.100ms="search" 
    type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search"
    @focus="isOpen=true"
    @keydown="isOpen=true"
    @keydown.escape.window="isOpen = false"
    @keydown.shif.tab="isOpen=false"
    >
    <div wire:loading class="spinner top-0 mt-4 right-0 mr-4"></div>
    <div class="z-50 absolute bg-gray-800 rounded w-64 mt-4 text-sm"
     x-show="isOpen">
            @if ($searchResults->count()>0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li class="border border-b border-white-200">
                            <a href="{{route('movies.show', $result['id'])}}" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                                <img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" class="w-8">
                                <span class="ml-4">{{$result['title']}}</span>  
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
    </div>
</div>