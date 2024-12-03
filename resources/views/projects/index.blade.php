<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">{{ __('Projects List') }}</h3>
                        <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Add Project') }}
                        </a>
                    </div>

                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b py-2">{{ __('Project Name') }}</th>
                                <th class="border-b py-2">{{ __('Client') }}</th>
                                <th class="border-b py-2">{{ __('Status') }}</th>
                                <th class="border-b py-2">{{ __('Address') }}</th>
                                <th class="border-b py-2 text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <td class="border-b py-2">{{ $project->project_name }}</td>
                                    <td class="border-b py-2">{{ $project->client->client_name ?? __('N/A') }}</td>
                                    <td class="border-b py-2">{{ ucfirst($project->project_status) }}</td>
                                    <td class="border-b py-2">{{ $project->address }}</td>
                                    <td class="border-b py-2 text-center">
                                        <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-500 hover:text-blue-700">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('{{ __('Are you sure you want to delete this project?') }}')" class="text-red-500 hover:text-red-700">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">{{ __('No projects found.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
