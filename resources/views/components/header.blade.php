<header class="fixed top-0 left-0 w-full bg-white/95 backdrop-blur-md shadow-sm z-50">
    <div class="relative w-full max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between py-4 lg:py-6">
            <!-- Brand Logo with Hover Effect -->
            <div class="flex items-center space-x-4 group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-10 w-10 text-[#FF2D20] group-hover:scale-110 transition-transform duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
                <span
                    class="text-2xl font-bold text-gray-800 group-hover:text-[#FF2D20] transition-colors">YourBrand</span>
            </div>

            <!-- Navigation Menu -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ url('/') }}"
                    class="relative group text-gray-700 hover:text-[#FF2D20] transition-colors font-medium 
                    before:absolute before:-bottom-2 before:left-0 before:w-0 before:h-0.5 before:bg-[#FF2D20] 
                    before:transition-all before:duration-300 
                    hover:before:w-full {{ request()->is('/') ? 'text-[#FF2D20] before:w-full' : '' }}">
                    Home
                </a>
                <a href="/blogs"
                    class="relative group text-gray-700 hover:text-[#FF2D20] transition-colors font-medium 
                    before:absolute before:-bottom-2 before:left-0 before:w-0 before:h-0.5 before:bg-[#FF2D20] 
                    before:transition-all before:duration-300 
                    hover:before:w-full">
                    Blogs
                </a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="rounded-md px-4 py-2 bg-[#FF2D20]/10 text-[#FF2D20] 
                            hover:bg-[#FF2D20]/20 transition-colors transform hover:scale-105 active:scale-95">
                            Dashboard
                        </a>
                    @else
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('login') }}"
                                class="relative group text-gray-700 hover:text-[#FF2D20] 
                                transition-colors font-medium 
                                before:absolute before:-bottom-2 before:left-0 before:w-0 before:h-0.5 before:bg-[#FF2D20] 
                                before:transition-all before:duration-300 
                                hover:before:w-full">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="rounded-md px-4 py-2 bg-[#FF2D20] text-white 
                                    hover:bg-[#e02717] transition-colors transform hover:scale-105 active:scale-95">
                                    Register
                                </a>
                            @endif
                        </div>
                    @endauth
                @endif
            </nav>

            <!-- Mobile Menu Toggle with Hover Effect -->
            <div class="md:hidden">
                <button id="mobile-menu-toggle"
                    class="text-gray-700 hover:text-[#FF2D20] focus:outline-none 
                    transform hover:scale-110 active:scale-95 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu"
            class="md:hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-md shadow-lg hidden">
            <div class="px-6 py-4 space-y-4">
                <a href="{{ url('/') }}"
                    class="block text-gray-700 hover:text-[#FF2D20] transition-colors font-medium 
                    {{ request()->is('/') ? 'text-[#FF2D20] font-semibold' : '' }}">
                    Home
                </a>
                <a href="/blogs"
                    class="block text-gray-700 hover:text-[#FF2D20] transition-colors font-medium">
                    Blogs
                </a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="block w-full rounded-md px-4 py-2 bg-[#FF2D20]/10 
                            text-[#FF2D20] hover:bg-[#FF2D20]/20 text-center transition-colors">
                            Dashboard
                        </a>
                    @else
                        <div class="space-y-4">
                            <a href="{{ route('login') }}"
                                class="block w-full text-center text-gray-700 
                                hover:text-[#FF2D20] transition-colors font-medium">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="block w-full rounded-md px-4 py-2 
                                    bg-[#FF2D20] text-white hover:bg-[#e02717] text-center transition-colors">
                                    Register
                                </a>
                            @endif
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuToggle.addEventListener('click', function(event) {
            event.stopPropagation();
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });

        // Prevent mobile menu from closing when clicking inside
        mobileMenu.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });
</script>