<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Create Project Form -->
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf

                        <!-- Client ID -->
                        <div>
                            <x-input-label for="client_id" :value="__('Client')" />
                            <select id="client_id" name="client_id" class="block mt-1 w-full text-black" required>
                                <option value="">Select Client</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                        {{ $client->client_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div>

                        <!-- Project Name -->
                        <div class="mt-4">
                            <x-input-label for="project_name" :value="__('Project Name')" />
                            <x-text-input id="project_name" class="block mt-1 w-full text-black" type="text" name="project_name" :value="old('project_name')" required />
                            <x-input-error :messages="$errors->get('project_name')" class="mt-2" />
                        </div>

                        <!-- Project Address -->
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Project Address')" />
                            <x-text-input id="address" class="block mt-1 w-full text-black" type="text" name="address" :value="old('address')" required />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- Project Status -->
                        <div class="mt-4">
                            <x-input-label for="project_status" :value="__('Project Status')" />
                            <select id="project_status" name="project_status" class="block mt-1 w-full text-black" required>
                                <option value="pending" {{ old('project_status') == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="in_progress" {{ old('project_status') == 'in_progress' ? 'selected' : '' }}>
                                    In Progress
                                </option>
                                <option value="completed" {{ old('project_status') == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>
                                <option value="cancelled" {{ old('project_status') == 'cancelled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('project_status')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Create Project') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
