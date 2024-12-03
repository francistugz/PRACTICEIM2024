<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients List') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <!-- Add Client Button -->
            <div class="mb-4">
                <a href="{{ route('clients.create') }}" class="text-indigo-600 hover:text-indigo-900">
                    <x-primary-button>
                        {{ __('Create New Client') }}
                    </x-primary-button>
                </a>
            </div>

            <!-- Clients Table -->
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Client Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Company
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contact Number
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            TIN
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($clients as $client)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $client->client_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $client->Client_Company }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $client->Client_email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $client->Client_ContactNo }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $client->Client_TIN }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('clients.edit', $client->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            |
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this client?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
