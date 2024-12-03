<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Create New Entries Section -->
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-4">Create New Entries</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('clients.create') }}" class="bg-blue-500 text-white p-4 rounded-lg text-center">
                                Add Client
                            </a>
                            <a href="{{ route('projects.create') }}" class="bg-green-500 text-white p-4 rounded-lg text-center">
                                Add Project
                            </a>
                            <a href="{{ route('invoices.create') }}" class="bg-yellow-500 text-white p-4 rounded-lg text-center">
                                Create Invoice
                            </a>
                            <a href="{{ route('payments.create') }}" class="bg-indigo-500 text-white p-4 rounded-lg text-center">
                                Record Payment
                            </a>
                        </div>
                    </div>

                    <!-- View Existing Entries Section -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4">View Existing Entries</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('clients.index') }}" class="bg-blue-600 text-white p-4 rounded-lg text-center">
                                View Clients
                            </a>
                            <a href="{{ route('projects.index') }}" class="bg-green-600 text-white p-4 rounded-lg text-center">
                                View Projects
                            </a>
                            <a href="{{ route('invoices.index') }}" class="bg-yellow-600 text-white p-4 rounded-lg text-center">
                                View Invoices
                            </a>
                            <a href="{{ route('payments.index') }}" class="bg-indigo-600 text-white p-4 rounded-lg text-center">
                                View Payments
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
