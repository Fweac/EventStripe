<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Event') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
    <main class="dark:bg-gray-800 bg-white relative overflow-hidden h-screen">
        <header class="h-24 sm:h-32 flex items-center z-30 w-full">
            <div class="container mx-auto px-6 flex items-center justify-between">
                <div class="uppercase text-gray-800 dark:text-white font-black text-3xl">
                    {{ config('app.name', 'Event') }}
                </div>
                <div class="flex items-center">
                    <nav class="font-sen text-gray-800 dark:text-gray-300 uppercase text-lg flex items-center">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="py-2 px-6 hidden sm:flex">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="py-2 px-6 hidden sm:flex">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="py-2 px-6 hidden sm:flex">Register</a>
                                @endif
                            @endauth
                        @endif

                        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-800 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </button>
                    </nav>
                </div>
            </div>
        </header>
        <div class="hidden justify-between items-center w-full" id="navbar-sticky">
            <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/dashboard') }}" class="rounded-lg dark:text-gray-300 dark:hover:bg-yellow-400 dark:hover:text-gray-800 hover:bg-gray-100 py-2 px-6 flex">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="rounded-lg dark:text-gray-300 dark:hover:bg-yellow-400  dark:hover:text-gray-800 hover:bg-gray-100 py-2 px-6 flex">Log in</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="rounded-lg dark:text-gray-300 dark:hover:bg-yellow-400  dark:hover:text-gray-800 hover:bg-gray-100 py-2 px-6 flex">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
        <div class="bg-white dark:bg-gray-800 flex relative z-20 items-center overflow-hidden">
            <div class="container mx-auto px-6 flex relative py-16">
                <div class="sm:w-2/3 lg:w-2/5 flex flex-col relative z-20">
                <span class="w-20 h-2 bg-gray-800 dark:bg-yellow-400 mb-12">
                </span>
                    <h1 class="font-bebas-neue uppercase text-6xl sm:text-9xl font-black flex flex-col leading-none dark:text-white text-gray-800">
                        Buy
                        <span class="text-4xl sm:text-7xl">
                        Ticket
                    </span>
                    </h1>
                    <p class="text-sm sm:text-base text-gray-700 dark:text-white">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu augue ut lectus arcu bibendum. Ac auctor augue mauris augue neque. Odio morbi quis commodo odio aenean sed. Volutpat diam ut venenatis tellus in metus. Neque ornare aenean euismod elementum. Aliquet nibh praesent tristique magna sit amet purus gravida quis. Non enim praesent elementum facilisis leo vel. Feugiat vivamus at augue eget arcu dictum varius duis at. Convallis posuere morbi leo urna molestie at elementum eu facilisis. Semper feugiat nibh sed pulvinar. Elit ut aliquam purus sit amet luctus. Quis auctor elit sed vulputate mi sit amet.
                    </p>
                    <div class="flex mt-8">
                        <a href="{{ route('ticket.create') }}" class="uppercase py-2 px-4 rounded-lg bg-transparent border-2 border-pink-500 text-pink-500 dark:border-yellow-400 dark:text-white dark:hover:bg-yellow-400 dark:hover:text-gray-800 dark:hover:border-gray-800 hover:bg-pink-500 hover:text-white hover:bg-gray-800 text-md">
                            Purchase Ticket
                        </a>
                    </div>
                </div>
                <div class="hidden sm:block sm:w-1/3 lg:w-3/5 relative mt-12">
                    <img src="{{ asset('storage/pictures/HOME_VLADIMIR.png.webp') }}" class="max-w-xs md:max-w-sm m-auto"/>
                </div>
            </div>
        </div>
    </main>
    <script>
        const collapse = document.getElementById('navbar-sticky');
        const collapseToggle = document.querySelector('[data-collapse-toggle]');
        collapseToggle.addEventListener('click', () => {
            collapse.classList.toggle('hidden');
        });
    </script>
    </body>
</html>
