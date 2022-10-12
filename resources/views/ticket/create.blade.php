<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500 mx-auto mb-6" />
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                        <x-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mt-4 text-gray-500">
                        <form method="POST" action="{{ route('ticket.store') }}" id="payment-form">
                            @csrf

                            <!-- Price -->
                            <div class="flex flex-col items-center">
                                <!-- display price who change with quantity -->
                                <div class="flex flex-col items-center">
                                    <p class="text-1xl font-bold">Total Price: <span id="totalPrice">0</span>€</p>
                                    <!-- send the total price to the controller -->
                                    <input type="hidden" name="totalPrice" id="PriceInput" value="0">
                                </div>
                            </div>


                                <!-- How many tickets? -->
                            <div class="mt-4">
                                <x-input-label for="quantity" :value="__('How many tickets?')" />

                                <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" min="1" :value="old('quantity')" required autofocus />
                            </div>

                                <!-- Payment -->
                            <div class="mt-4" id="card-element">
                                <!-- Elements will create input elements here -->
                            </div>
                                <!-- Display little red error message -->
                            <div id="card-errors" class="text-red-500" role="alert"></div>
                            <input type="hidden" name="payment_method" id="payment_method">

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4" id="btnSubmit">
                                    {{ __('Purchase') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // get the quantity input
        const quantity = document.getElementById('quantity');
        // get the total price span
        const totalPrice = document.getElementById('totalPrice');
        // get the send price input
        const sendPrice = document.getElementById('PriceInput');
        // get the price of the ticket
        const price = 10;
        // set the total price to 0
        totalPrice.innerHTML = 0;
        // set the send price to 0
        sendPrice.value = 0;
        // add an event listener to the quantity input
        quantity.addEventListener('input', function() {
            // set the total price to the quantity * price
            totalPrice.innerHTML = quantity.value * price;
            // set the send price to the quantity * price
            sendPrice.value = quantity.value * price;
        });
    </script>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const divErrors = document.getElementById('card-errors');
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            style: {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            }
        });
        cardElement.mount('#card-element');

        const submitButton = document.getElementById('btnSubmit');
        const form = document.getElementById('payment-form');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement
            );

            if (error) {
                divErrors.textContent = error.message;
            } else {
                // Send to input hidden and submit form
                document.getElementById('payment_method').value = paymentMethod.id;
                form.submit();
            }
        });
    </script>
</x-app-layout>
