<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Edit Client Form -->
                    <form method="POST" action="{{ route('clients.update', $client->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Client Name -->
                        <div class="mb-4">
                            <label for="client_name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Client Name</label>
                            <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $client->client_name) }}" class="mt-1 block w-full text-black" required />
                        </div>

                        <!-- Client Company -->
                        <div class="mb-4">
                            <label for="Client_Company" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Client Company</label>
                            <input type="text" id="Client_Company" name="Client_Company" value="{{ old('Client_Company', $client->Client_Company) }}" class="mt-1 block w-full text-black" required />
                        </div>

                        <!-- Client Email -->
                        <div class="mb-4">
                            <label for="Client_email" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Client Email</label>
                            <input type="email" id="Client_email" name="Client_email" value="{{ old('Client_email', $client->Client_email) }}" class="mt-1 block w-full text-black" required />
                        </div>

                        <!-- Client Contact No -->
                        <div class="mb-4">
                            <label for="Client_ContactNo" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Client Contact No</label>
                            <input type="text" id="Client_ContactNo" name="Client_ContactNo" value="{{ old('Client_ContactNo', $client->Client_ContactNo) }}" class="mt-1 block w-full text-black" required />
                        </div>

                        <!-- Client TIN -->
                        <div class="mb-4">
                            <label for="Client_TIN" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Client TIN</label>
                            <input type="text" id="Client_TIN" name="Client_TIN" value="{{ old('Client_TIN', $client->Client_TIN) }}" class="mt-1 block w-full text-black" required />
                        </div>

                        <!-- Client Address -->
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address', $client->address) }}" class="mt-1 block w-full text-black" required />
                        </div>

                        <!-- Save Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="ml-4 px-4 py-2 text-white bg-blue-600 rounded-md">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
