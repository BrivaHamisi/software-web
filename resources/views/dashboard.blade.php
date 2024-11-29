<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-900">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-lg text-gray-800">
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ __("You're logged in!") }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>