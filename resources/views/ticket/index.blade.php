<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    @foreach($tickets as $ticket)
        <div class="py-5">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div
                        @if($ticket->validated)
                            class="p-6 bg-yellow-400 border-b border-gray-200 cursor-default text-center"
                        @else
                            class="p-6 bg-white hover:bg-gray-200 border-b border-gray-200 cursor-pointer text-center"
                        @endif>
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
                </div>
            </div>
        </div>
    @endforeach

    <div class="flex justify-center p-6">
        {{ $tickets->links() }}
    </div>
</x-app-layout>
