<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Project Name -->
                    <div>
                        <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name</label>
                        <input type="text" id="project_name" name="project_name" value="{{ old('project_name', $project->project_name) }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                        @error('project_name')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Client -->
                    <div>
                        <label for="client_id" class="block text-sm font-medium text-gray-700">Client</label>
                        <select id="client_id" name="client_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <option value="" disabled>Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $client->id == old('client_id', $project->client_id) ? 'selected' : '' }}>
                                    {{ $client->client_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Project Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Project Address</label>
                        <textarea id="address" name="address" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('address', $project->address) }}</textarea>
                        @error('address')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Project Status -->
                    <div>
                        <label for="project_status" class="block text-sm font-medium text-gray-700">Project Status</label>
                        <select id="project_status" name="project_status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <option value="pending" {{ old('project_status', $project->project_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ old('project_status', $project->project_status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('project_status', $project->project_status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('project_status', $project->project_status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('project_status')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4">
                        <!-- Cancel Button -->
                        <a href="{{ route('projects.index') }}" class="text-gray-600 hover:text-gray-900">
                            <x-secondary-button>
                                {{ __('Cancel') }}
                            </x-secondary-button>
                        </a>

                        <!-- Save Button -->
                        <x-primary-button type="submit">
                            {{ __('Save Changes') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
