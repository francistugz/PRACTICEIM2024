<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payments for') }} {{ $client->client_name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium mb-4">{{ __('Payment Details') }}</h3>
                    <table class="table-auto w-full text-left border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">#</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Amount') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Date') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Description') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $payment->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $payment->amount }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $payment->created_at->format('Y-m-d') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $payment->description }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">{{ __('No payments found for this client.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
