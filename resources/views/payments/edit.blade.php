<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('payments.update', $payment->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Invoice -->
                        <div class="mb-4">
                            <x-input-label for="invoice_id" :value="__('Invoice')" />
                            <select id="invoice_id" name="invoice_id" class="block mt-1 w-full" required>
                                @foreach ($invoices as $invoice)
                                    <option value="{{ $invoice->id }}" {{ old('invoice_id', $payment->invoice_id) == $invoice->id ? 'selected' : '' }}>
                                        {{ $invoice->invoice_number }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('invoice_id')" class="mt-2" />
                        </div>

                        <!-- Payment Method -->
                        <div class="mb-4">
                            <x-input-label for="payment_method" :value="__('Payment Method')" />
                            <select id="payment_method" name="payment_method" class="block mt-1 w-full text-black" required>
                                <option value="cash" {{ old('payment_method', $payment->payment_method) == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="card" {{ old('payment_method', $payment->payment_method) == 'card' ? 'selected' : '' }}>Card</option>
                                <option value="cheque" {{ old('payment_method', $payment->payment_method) == 'cheque' ? 'selected' : '' }}>Cheque</option>
                            </select>
                            <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
                        </div>

                        <!-- Amount -->
                        <div class="mb-4">
                            <x-input-label for="amount" :value="__('Amount')" />
                            <x-text-input id="amount" type="number" name="amount" value="{{ old('amount', $payment->amount) }}" class="block mt-1 w-full text-black" required />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <!-- Payment Date -->
                        <div class="mb-4">
                            <x-input-label for="payment_date" :value="__('Payment Date')" />
                            <x-text-input id="payment_date" type="date" name="payment_date" value="{{ old('payment_date', $payment->payment_date) }}" class="block mt-1 w-full text-black" required />
                            <x-input-error :messages="$errors->get('payment_date')" class="mt-2" />
                        </div>

                        <!-- Reference Number -->
                        <div class="mb-4">
                            <x-input-label for="reference_number" :value="__('Reference Number')" />
                            <x-text-input id="reference_number" type="text" name="reference_number" value="{{ old('reference_number', $payment->reference_number) }}" class="block mt-1 w-full text-black" />
                            <x-input-error :messages="$errors->get('reference_number')" class="mt-2" />
                        </div>

                        <!-- Notes (Now a text input) -->
                        <div class="mb-4">
                            <x-input-label for="notes" :value="__('Notes')" />
                            <x-text-input id="notes" type="text" name="notes" value="{{ old('notes', $payment->notes) }}" class="block mt-1 w-full text-black" />
                            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>{{ __('Update Payment') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
