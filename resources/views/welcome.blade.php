<x-layout>
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-900 min-h-screen flex flex-col">
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            <div class="relative w-full max-w-7xl px-6 lg:px-8">
                <header class="grid grid-cols-2 items-center gap-4 py-6 lg:grid-cols-3">
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        <span class="text-2xl font-bold text-gray-800">YourBrand</span>
                    </div>
                    <div class="flex justify-center lg:col-start-2">
                        <!-- Optional centered logo area -->
                    </div>
                    @if (Route::has('login'))
                        <nav class="flex flex-col sm:flex-row items-center justify-end space-y-2 sm:space-y-0 sm:space-x-4 w-full">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="w-full sm:w-auto rounded-md px-4 py-2 bg-[#FF2D20]/10 text-[#FF2D20] hover:bg-[#FF2D20]/20 transition-colors text-center"
                                >
                                    Dashboard
                                </a>
                            @else
                                <div class="flex flex-col sm:flex-row w-full sm:w-auto space-y-2 sm:space-y-0 sm:space-x-4">
                                    <a
                                        href="{{ route('login') }}"
                                        class="w-full sm:w-auto rounded-md px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors text-center"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="w-full sm:w-auto rounded-md px-4 py-2 bg-[#FF2D20] text-white hover:bg-[#e02717] transition-colors text-center"
                                        >
                                            Register
                                        </a>
                                    @endif
                                </div>
                            @endauth
                        </nav>
                    @endif
                </header>

                <div class="flex flex-col items-center justify-center text-center max-w-3xl mx-auto mt-12 space-y-6">
                    <h1 class="text-5xl font-bold mb-4 text-gray-900 leading-tight">
                        Transform Your Business 
                        <br />
                        <span class="text-[#FF2D20]">with Smart Software</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 max-w-2xl">
                        Streamline your operations, boost productivity, and drive growth with our cutting-edge business solutions tailored to your unique needs.
                    </p>
                    <div class="flex space-x-4">
                        <button class="bg-[#FF2D20] text-white px-8 py-3 rounded-full hover:bg-[#e02717] transition-all shadow-md hover:shadow-lg">
                            Get Started
                        </button>
                        <button class="border border-gray-300 text-gray-700 px-8 py-3 rounded-full hover:bg-gray-100 transition-all">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
