@extends('layouts.main')


@section('content')
    <div class=" container mx-auto px-4 py-16">
        <div class="pop-movies">
            <h2 class=" uppercase tracking-wider text-orange-500 text-lg font-semibold">popular actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach ($popActors as $actor)

                    <div class="mt-8">
                        <a href="{{route('actors.show', $actor['id'])}}">
                            <img src="{{$actor['profile_path']}}" alt="">
                        </a>
                        <div class="mt-2">
                            <a href="{{route('actors.show', $actor['id'])}}" class="text-lg hover:text-gray-300">{{$actor['name']}}</a>
                            <div class="text-sm text-gray-400">{{$actor['known_for']}}</div>
                        </div>
                    </div>

                @endforeach
                
            </div>
        </div>
        <hr class=" mt-5">
        <div class="flex justify-between mt-16" >

            {{-- Variables $previous and $next are functions !!! --}}
            @if ($previous)
                <a href="/actors/page/{{$previous}}">Previous </a>
            @else
                <div></div>
            @endif

            <div>
                @if ($page >=1)
                    <a href="/actors/page/1">First</a>
                @endif
            </div>
            
            <div>
                @if ($page<=500)
                    <a href="/actors/page/500">Last</a>
                @endif
            </div>
            
            @if ($next)
                <a href="/actors/page/{{$next}}">Next</a>
            @else
                <div></div>
            @endif

        </div>
    </div>
@endsection