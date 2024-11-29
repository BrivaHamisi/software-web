<nav x-data="{ open: false }" class="bg-white shadow-sm border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        <span class="ml-2 text-2xl font-bold text-gray-800">YourBrand</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium 
                        {{ request()->routeIs('dashboard') ? 'text-[#FF2D20] border-b-2 border-[#FF2D20]' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ __('Dashboard') }}
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button 
                        @click="dropdownOpen = !dropdownOpen"
                        @click.outside="dropdownOpen = false"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                    >
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <div 
                        x-show="dropdownOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0"
                    >
                        <div class="rounded-md shadow-xs bg-white ring-1 ring-black ring-opacity-5">
                            <a 
                                href="{{ route('profile.edit') }}" 
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF2D20] transition"
                            >
                                {{ __('Profile') }}
                            </a>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a 
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF2D20] transition"
                                >
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button 
                    @click="open = ! open" 
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-[#FF2D20] hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-[#FF2D20] transition duration-150 ease-in-out"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path 
                            :class="{'hidden': open, 'inline-flex': ! open }" 
                            class="inline-flex" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M4 6h16M4 12h16M4 18h16" 
                        />
                        <path 
                            :class="{'hidden': ! open, 'inline-flex': open }" 
                            class="hidden" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M6 18L18 6M6 6l12 12" 
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div 
        :class="{'block': open, 'hidden': ! open}" 
        class="hidden sm:hidden"
    >
        <div class="pt-2 pb-3 space-y-1">
            <a 
                href="{{ route('dashboard') }}" 
                class="block w-full ps-3 pe-4 py-2 border-l-4 
                    {{ request()->routeIs('dashboard') ? 'bg-[#FF2D20]/10 border-[#FF2D20] text-[#FF2D20]' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}"
            >
                {{ __('Dashboard') }}
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a 
                    href="{{ route('profile.edit') }}" 
                    class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-sm text-gray-600 hover:bg-gray-50 hover:border-[#FF2D20] hover:text-[#FF2D20]"
                >
                    {{ __('Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a 
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-sm text-gray-600 hover:bg-gray-50 hover:border-[#FF2D20] hover:text-[#FF2D20]"
                    >
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>