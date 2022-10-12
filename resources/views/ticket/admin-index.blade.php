<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All-Tickets') }}
        </h2>
    </x-slot>

    <!-- div for search form -->
    <div class="flex justify-center mt-2">
        <form action="{{ route('ticket.admin-index') }}" method="GET" class="w-full max-w-sm">
            <label for="search" >
                <div class="flex items-center border-b border-b-2 border-teal-500 hover:border-gray-300 cursor-text py-2">
                    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" id="search" name="search" type="text" placeholder="Search by number" aria-label="Full name">
                    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-gray-300 text-sm border-4 text-gray-500 py-1 px-2 rounded" type="submit">
                        Search
                    </button>
                </div>
            </label>
        </form>
    </div>

    <!-- if $tickets is empty -->
    @if ($tickets->isEmpty())
        <!-- div verical and horizontal center of page -->
        <div class="flex items-center justify-center h-64 sm:h-96">
            <!-- div for text -->
            <div class="text-center">
                <!-- text -->
                <p class="text-2xl text-gray-600">No tickets found</p>
            </div>
        </div>
    @endif

    @foreach($tickets as $ticket)
        <div class="py-5">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- update ticket when click on div -->
                    <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                        @csrf
                        @method('PUT')
                    <div
                        @if($ticket->validated)
                            class="p-6 bg-yellow-400 border-b border-gray-200 cursor-default text-center"
                        @else
                            class="p-6 bg-white hover:bg-gray-200 border-b border-gray-200 cursor-pointer text-center" onclick="javascript:this.parentNode.submit();"
                        @endif
                        >
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ $ticket->ticket_number }}
                        </h2>
                        @if($ticket->validated)
                            <div class="flex">
                                <svg class="h-6 w-6 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                                <p class="ml-3 text-red-500 text-left">Used</p>
                            </div>

                        @else
                            <div class="flex">
                                <svg class="h-6 w-6 text-green-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>
                                <p class="ml-3 text-green-500 text-left">Not Used</p>
                            </div>
                        @endif
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- div for pagination -->
    <div class="flex justify-center p-6">
        {{ $tickets->links() }}
    </div>
</x-app-layout>
