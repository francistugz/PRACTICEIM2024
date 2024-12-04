<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoice List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
      
                        <table class="table-auto w-full text-left border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="border border-gray-300 px-4 py-2">{{ __('Invoice Number') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ __('Client') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ __('Project') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ __('Invoice Date') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ __('Due Date') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ __('Total Amount') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ __('Status') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($invoices as $invoice)
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">{{ $invoice->invoice_number }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $invoice->client->name }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $invoice->project->name ?? 'N/A' }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $invoice->invoice_date->format('Y-m-d') }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $invoice->due_date->format('Y-m-d') }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($invoice->total_amount, 2) }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                <span class="px-2 py-1 text-sm rounded 
                                                    @if ($invoice->status === 'draft') bg-gray-200 dark:bg-gray-600 
                                                    @elseif ($invoice->status === 'issued') bg-yellow-200 dark:bg-yellow-400 
                                                    @elseif ($invoice->status === 'paid') bg-green-200 dark:bg-green-400 
                                                    @elseif ($invoice->status === 'overdue') bg-red-200 dark:bg-red-400 
                                                    @endif">
                                                    {{ ucfirst($invoice->status) }}
                                                </span>
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                <!-- Edit Action -->
                                        <a href="{{ route('invoices.edit', $invoice) }}" 
                                            class="text-blue-500 hover:text-blue-700">
                                            {{ __('Edit') }}
                                        </a>
                                                <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 dark:text-red-300 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                  
                                    @empty
                                    <tr>
                                    <td colspan="8" class="text-center py-4">{{ __('No Invoices found.') }}</td>
                                     </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
