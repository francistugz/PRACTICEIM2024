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
                    <!-- Live Statistics Section -->
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-4">LIVE STATISTICS</h3>

                        <!-- Statistics Row (Flex Layout) -->
                        <div class="flex space-x-4">
                            <!-- Client Count -->
                            <div class="bg-gray-200 hover:bg-red-500 text-gray-800 hover:text-white p-6 rounded-lg shadow-lg text-center w-1/5 transition-colors duration-300">
                                <h2 class="text-xl font-bold">TOTAL CLIENTS</h2>
                                <p class="text-3xl font-bold">{{ \App\Models\Client::count() }}</p>
                            </div>

                            <!-- Completed Projects Count -->
                            <div class="bg-gray-200 hover:bg-red-500 text-gray-800 hover:text-white p-6 rounded-lg shadow-lg text-center w-1/5 transition-colors duration-300">
                                <h2 class="text-xl font-bold">COMPLETED PROJECTS</h2>
                                <p class="text-3xl font-bold">{{ \App\Models\Project::where('project_status', 'completed')->count() }}</p>
                            </div>

                            <!-- Ongoing Projects Count -->
                            <div class="bg-gray-200 hover:bg-red-500 text-gray-800 hover:text-white p-6 rounded-lg shadow-lg text-center w-1/5 transition-colors duration-300">
                                <h2 class="text-xl font-bold">ONGOING PROJECTS</h2>
                                <p class="text-3xl font-bold">{{ \App\Models\Project::where('project_status', 'pending')->count() }}</p>
                            </div>

                            <!-- Invoice Count -->
                            <div class="bg-gray-200 hover:bg-red-500 text-gray-800 hover:text-white p-6 rounded-lg shadow-lg text-center w-1/5 transition-colors duration-300">
                                <h2 class="text-xl font-bold">TOTAL INVOICES</h2>
                                <p class="text-3xl font-bold">{{ \App\Models\Invoice::count() }}</p>
                            </div>

                            <!-- Payment Count -->
                            <div class="bg-gray-200 hover:bg-red-500 text-gray-800 hover:text-white p-6 rounded-lg shadow-lg text-center w-1/5 transition-colors duration-300">
                                <h2 class="text-xl font-bold">TOTAL PAYMENTS</h2>
                                <p class="text-3xl font-bold">{{ \App\Models\Payment::count() }}</p>
                            </div>

                            <div class="bg-gray-200 hover:bg-red-500 text-gray-800 hover:text-white p-6 rounded-lg shadow-lg text-center w-1/5 transition-colors duration-300">
                                <h2 class="text-xl font-bold">INCOMING INVOICE DUE DATE</h2>
                                <p class="text-3xl font-bold">
                                    @php
                                        // Fetch the nearest invoice due date
                                        $nearestInvoice = \App\Models\Invoice::whereDate('due_date', '>=', now())
                                        ->orderBy('due_date', 'asc')
                                        ->first();
                                    @endphp
    
                                        {{ $nearestInvoice ? $nearestInvoice->due_date->format('Y-m-d') : 'No upcoming invoices' }}
                                </p>
                            </div>

                        </div>
                    </div>
                        
                        <h3 class="text-xl font-semibold mb-4">Action Buttons</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('clients.create') }}" class="bg-gray-500 hover:bg-red-500 text-white p-4 rounded-lg text-center">
                                ADD CLIENT
                            </a>
                            <a href="{{ route('invoices.create') }}" class="bg-gray-500 hover:bg-red-500 text-white p-4 rounded-lg text-center">
                                CREATE INVOICE
                            </a>
                            <a href="{{ route('payments.create') }}" class="bg-gray-500 hover:bg-red-500 text-white p-4 rounded-lg text-center">
                                RECORD PAYMENT
                            </a>
                            <a href="{{ route('payments.index') }}" class="bg-gray-500 hover:bg-red-500 text-white p-4 rounded-lg text-center">
                                VIEW PAYMENTS
                            </a>
                        </div>
                    

                    <!-- View Existing Entries Section -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4">VIEW EXISTING DATA</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('clients.index') }}" class="bg-gray-500 hover:bg-red-500 text-white p-4 rounded-lg text-center">
                                VIEW CLIENTS
                            </a>
                            <a href="{{ route('projects.index') }}" class="bg-gray-500 hover:bg-red-500 text-white p-4 rounded-lg text-center">
                                VIEW PROJECTS
                            </a>
                            <a href="{{ route('invoices.index') }}" class="bg-gray-500 hover:bg-red-500 text-white p-4 rounded-lg text-center">
                               VIEW INVOICES
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</x-app-layout>
