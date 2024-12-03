<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Edit Invoice Form -->
                    <form method="POST" action="{{ route('invoices.update', $invoice->invoices_id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Invoice Number -->
                        <div>
                            <x-input-label for="invoice_number" :value="__('Invoice Number')" />
                            <x-text-input id="invoice_number" class="block mt-1 w-full" type="text" name="invoice_number" :value="old('invoice_number', $invoice->invoice_number)" required />
                            <x-input-error :messages="$errors->get('invoice_number')" class="mt-2" />
                        </div>

                        <!-- Client -->
                        <div class="mt-4">
                            <x-input-label for="client_id" :value="__('Client')" />
                            <select id="client_id" class="block mt-1 w-full" name="client_id" required>
                                <option value="" disabled>Select Client</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ $invoice->client_id == $client->id ? 'selected' : '' }}>{{ $client->client_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div>

                        <!-- Project -->
                        <div class="mt-4">
                            <x-input-label for="project_id" :value="__('Project')" />
                            <select id="project_id" class="block mt-1 w-full" name="project_id">
                                <option value="" disabled>Select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ $invoice->project_id == $project->id ? 'selected' : '' }}>{{ $project->project_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
                        </div>

                        <!-- Total Amount -->
                        <div class="mt-4">
                            <x-input-label for="total_amount" :value="__('Total Amount')" />
                            <x-text-input id="total_amount" class="block mt-1 w-full" type="number" step="0.01" name="total_amount" :value="old('total_amount', $invoice->total_amount)" required />
                            <x-input-error :messages="$errors->get('total_amount')" class="mt-2" />
                        </div>

                        <!-- Due Date -->
                        <div class="mt-4">
                            <x-input-label for="due_date" :value="__('Due Date')" />
                            <x-text-input id="due_date" class="block mt-1 w-full" type="date" name="due_date" :value="old('due_date', $invoice->due_date)" required />
                            <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" class="block mt-1 w-full" name="status" required>
                                <option value="pending" {{ $invoice->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="overdue" {{ $invoice->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Notes -->
                        <div class="mt-4">
                            <x-input-label for="notes" :value="__('Notes')" />
                            <x-textarea id="notes" class="block mt-1 w-full" name="notes" rows="3">{{ old('notes', $invoice->notes) }}</x-textarea>
                            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update Invoice') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
