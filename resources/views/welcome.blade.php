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
                    <nav class="font-sen text-gray-800 dark:text-gray-300 uppercase text-lg lg:flex items-center hidden">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="py-2 px-6 flex">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="py-2 px-6 flex">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="py-2 px-6 flex">Register</a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                    <!-- Active burger menu -->
                    <div class="-mr-2 flex items-center lg:hidden">
                        <button @click="open = ! open" class="dark:text-gray-300 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <div class="bg-white dark:bg-gray-800 flex relative z-20 items-center overflow-hidden">
            <div class="container mx-auto px-6 flex relative py-16">
                <div class="sm:w-2/3 lg:w-2/5 flex flex-col relative z-20">
                <span class="w-20 h-2 bg-gray-800 dark:bg-yellow-400 mb-12">
                </span>
                    <h1 class="font-bebas-neue uppercase text-6xl sm:text-8xl font-black flex flex-col leading-none dark:text-white text-gray-800">
                        Be on
                        <span class="text-5xl sm:text-7xl">
                        Time
                    </span>
                    </h1>
                    <p class="text-sm sm:text-base text-gray-700 dark:text-white">
                        Dimension of reality that makes change possible and understandable. An indefinite and homogeneous environment in which natural events and human existence take place.
                    </p>
                    <div class="flex mt-8">
                        <a href="{{ route('ticket.create') }}" class="uppercase py-2 px-4 rounded-lg bg-transparent border-2 border-pink-500 text-pink-500 dark:border-yellow-400 dark:text-white dark:hover:bg-yellow-400 dark:hover:text-gray-800 dark:hover:border-gray-800 hover:bg-pink-500 hover:text-white text-md">
                            Purchase Ticket
                        </a>
                    </div>
                </div>
                <div class="hidden sm:block sm:w-1/3 lg:w-3/5 relative">
                    <img src="/images/object/10.png" class="max-w-xs md:max-w-sm m-auto"/>
                </div>
            </div>
        </div>
    </main>
    </body>
</html>
