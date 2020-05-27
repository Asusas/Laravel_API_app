<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Font-awesome --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- Custom styles --}}
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    {{-- LiveWire styles --}}
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Movie app</title>
</head>

    <body class="font-sans bg-gray-900 text-white">

        <nav class=" border-b border-gray-800 ">
            <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <ul class="flex flex-col md:flex-row items-center">
                    <li>
                    <a href="{{route('movies.index')}}">
                            <i class="fas fa-video"> All</i>
                        </a>
                    </li>
                    <li class=" md:ml-6 mt-3 md:mt-0">
                        <a href="{{route('movies.index')}}" class=" hover:text-gray-500">Movies</a>
                    </li>
                    <li class=" md:ml-6 mt-3 md:mt-0">
                        <a href="{{route('shows.index')}}" class=" hover:text-gray-500">TV Shows</a>
                    </li>
                    <li class=" md:ml-6 mt-3 md:mt-0">
                    <a href="{{route('actors.index')}}" class=" hover:text-gray-500">Actors</a>
                    </li>
                </ul>
                
                <livewire:search-drop-down />

            </div>
        </nav>
        {{-- extending .blade.php files --}}
        @yield('content')
        
        @livewireScripts
    </body>
</html>