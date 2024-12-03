<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Create Client Form -->
                    <form method="POST" action="{{ route('clients.store') }}">
                        @csrf

                        <!-- Client Name -->
                        <div>
                            <x-input-label for="client_name" :value="__('Client Name')" />
                            <x-text-input id="client_name" class="block mt-1 w-full" type="text" name="client_name" :value="old('client_name')" required />
                            <x-input-error :messages="$errors->get('client_name')" class="mt-2" />
                        </div>

                        <!-- Client Company -->
                        <div class="mt-4">
                            <x-input-label for="Client_Company" :value="__('Client Company')" />
                            <x-text-input id="Client_Company" class="block mt-1 w-full" type="text" name="Client_Company" :value="old('Client_Company')" required />
                            <x-input-error :messages="$errors->get('Client_Company')" class="mt-2" />
                        </div>

                        <!-- Client Email -->
                        <div class="mt-4">
                            <x-input-label for="Client_email" :value="__('Client Email')" />
                            <x-text-input id="Client_email" class="block mt-1 w-full" type="email" name="Client_email" :value="old('Client_email')" required />
                            <x-input-error :messages="$errors->get('Client_email')" class="mt-2" />
                        </div>

                        <!-- Client Contact Number -->
                        <div class="mt-4">
                            <x-input-label for="Client_ContactNo" :value="__('Client Contact Number')" />
                            <x-text-input id="Client_ContactNo" class="block mt-1 w-full" type="text" name="Client_ContactNo" :value="old('Client_ContactNo')" required />
                            <x-input-error :messages="$errors->get('Client_ContactNo')" class="mt-2" />
                        </div>

                        <!-- Client TIN -->
                        <div class="mt-4">
                            <x-input-label for="Client_TIN" :value="__('Client TIN')" />
                            <x-text-input id="Client_TIN" class="block mt-1 w-full" type="text" name="Client_TIN" :value="old('Client_TIN')" required />
                            <x-input-error :messages="$errors->get('Client_TIN')" class="mt-2" />
                        </div>

                        <!-- Client Address -->
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Client Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Create Client') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
