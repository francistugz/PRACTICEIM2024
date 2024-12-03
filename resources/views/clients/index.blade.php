<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">{{ __('Clients List') }}</h3>
                        <a href="{{ route('clients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Add Client') }}
                        </a>
                    </div>

                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b py-2">#</th>
                                <th class="border-b py-2">{{ __('Client Name') }}</th>
                                <th class="border-b py-2">{{ __('Company') }}</th>
                                <th class="border-b py-2">{{ __('Email') }}</th>
                                <th class="border-b py-2">{{ __('Contact Number') }}</th>
                                <th class="border-b py-2">{{ __('TIN') }}</th>
                                <th class="border-b py-2 text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)
                                <tr>
                                    <td class="border-b py-2">{{ $client->id }}</td>
                                    <td class="border-b py-2">{{ $client->client_name }}</td>
                                    <td class="border-b py-2">{{ $client->Client_Company }}</td>
                                    <td class="border-b py-2">{{ $client->Client_email }}</td>
                                    <td class="border-b py-2">{{ $client->Client_ContactNo }}</td>
                                    <td class="border-b py-2">{{ $client->Client_TIN }}</td>
                                    <td class="border-b py-2 text-center">
                                        <a href="{{ route('clients.edit', $client->id) }}" class="text-blue-500 hover:text-blue-700">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('{{ __('Are you sure you want to delete this client?') }}')" class="text-red-500 hover:text-red-700">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">{{ __('No clients found.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
