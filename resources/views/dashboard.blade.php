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
        </div>
    </div>
</x-app-layout>
