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
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-2 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="p-2 border-b text-black">Client Name</th>
                                <th class="p-2 border-b text-black">Company</th>
                                <th class="p-2 border-b text-black">Email</th>
                                <th class="p-2 border-b text-black">Contact</th>
                                <th class="p-2 border-b text-black">TIN</th>
                                <th class="p-2 border-b text-black">Address</th>
                                <th class="p-2 border-b text-black">Actions</th>
                                <th class="p-2 border-b text-black">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    
                                    <td class="p-2 border-b text-black">{{ $client->client_name }}</td>
                                    <td class="p-2 border-b text-black">{{ $client->Client_Company }}</td>
                                    <td class="p-2 border-b text-black">{{ $client->Client_email }}</td>
                                    <td class="p-2 border-b text-black">{{ $client->Client_ContactNo }}</td>
                                    <td class="p-2 border-b text-black">{{ $client->Client_TIN }}</td>
                                    <td class="p-2 border-b text-black">{{ $client->address }}</td>
                                    <td class="p-2 border-b text-black"> <a href="{{ route('clients.edit', $client->id) }}">Edit</a> </td>
                                    <td class="p-2 border-b text-black">
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 rounded">
                                     Delete
                                    </button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
