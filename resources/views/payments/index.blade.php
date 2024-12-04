<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b py-2">#</th>
                                <th class="border-b py-2">{{ __('Invoice Number') }}</th>
                                <th class="border-b py-2">{{ __('Payment Method') }}</th>
                                <th class="border-b py-2">{{ __('Amount') }}</th>
                                <th class="border-b py-2">{{ __('Payment Date') }}</th>
                                <th class="border-b py-2">{{ __('Reference Number') }}</th>
                                <th class="border-b py-2">{{ __('Notes') }}</th>
                                <th class="border-b py-2 text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <td class="border-b py-2">{{ $payment->id }}</td>
                                    <td class="border-b py-2">
                                        {{ $payment->invoice->invoice_number ?? __('N/A') }}
                                    </td>
                                    <td class="border-b py-2">{{ $payment->payment_method }}</td>
                                    <td class="border-b py-2">{{ number_format($payment->amount, 2) }}</td>
                                    <td class="border-b py-2">{{ $payment->payment_date }}</td>
                                    <td class="border-b py-2">{{ $payment->reference_number ?? __('N/A') }}</td>
                                    <td class="border-b py-2">{{ $payment->notes ?? __('N/A') }}</td>
                                    <td class="border-b py-2 text-center">
                                        <a href="{{ route('payments.edit', $payment->id) }}" class="text-blue-500 hover:text-blue-700">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('{{ __('Are you sure you want to delete this payment?') }}')" class="text-red-500 hover:text-red-700">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">{{ __('No payments found.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
