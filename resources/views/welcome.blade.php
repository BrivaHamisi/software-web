<x-layout>
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-900 min-h-screen flex flex-col">
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


        <!-- Main Content with Top Padding to Account for Fixed Header -->
        <div class="relative min-h-screen flex flex-col items-center justify-center pt-12 overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-0 right-0 w-96 h-96 bg-[#FF2D20]/10 rounded-full blur-3xl animate-blob"></div>
                <div
                    class="absolute bottom-0 left-0 w-96 h-96 bg-[#FF2D20]/10 rounded-full blur-3xl animate-blob animation-delay-4000">
                </div>
            </div>

            <div class="relative w-full max-w-7xl px-6 lg:px-8 z-10">
                <div class="flex flex-col items-center justify-center text-center max-w-3xl mx-auto mt-12 space-y-6">
                    <div class="relative">
                        <h1 class="text-5xl font-bold mb-4 text-gray-900 leading-tight relative">
                            Transform Your Business
                            <br />
                            <span class="text-[#FF2D20]">with Smart Software</span>
                            <div class="absolute -top-2 -right-2 w-12 h-12 bg-[#FF2D20]/20 rounded-full animate-ping">
                            </div>
                        </h1>
                    </div>
                    <p class="text-xl text-gray-600 mb-8 max-w-2xl opacity-0 animate-fadeIn animation-delay-500">
                        Streamline your operations, boost productivity, and drive growth with our cutting-edge business
                        solutions tailored to your unique needs.
                    </p>
                    <div
                        class="flex flex-wrap justify-center space-x-2 sm:space-x-4 opacity-0 animate-fadeIn animation-delay-1000">
                        <button
                            class="bg-[#FF2D20] text-white px-4 py-2 sm:px-8 sm:py-3 rounded-full hover:bg-[#e02717] transition-all shadow-md hover:shadow-lg transform hover:-translate-y-1 group text-sm sm:text-base">
                            Get Started
                            <span
                                class="inline-block ml-1 sm:ml-2 group-hover:translate-x-1 transition-transform">→</span>
                        </button>
                        <button
                            class="border border-gray-300 text-gray-700 px-4 py-2 sm:px-8 sm:py-3 rounded-full hover:bg-gray-100 transition-all transform hover:-translate-y-1 text-sm sm:text-base">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>

            <!-- Custom Tailwind Animations -->
            <style>
                @keyframes blob {
                    0% {
                        transform: translate(0, 0) scale(1);
                    }

                    33% {
                        transform: translate(30px, -50px) scale(1.1);
                    }

                    66% {
                        transform: translate(-20px, 20px) scale(0.9);
                    }

                    100% {
                        transform: translate(0, 0) scale(1);
                    }
                }

                .animate-blob {
                    animation: blob 10s infinite linear;
                }

                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .animate-fadeIn {
                    animation: fadeIn 0.8s ease-out forwards;
                }

                .animation-delay-500 {
                    animation-delay: 0.5s;
                }

                .animation-delay-1000 {
                    animation-delay: 1s;
                }

                .animation-delay-4000 {
                    animation-delay: 4s;
                }
            </style>
        </div>

        <!-- About Us Section -->
        <div id="about-us" class="py-24 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="bg-[#FF2D20]/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#FF2D20]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h3a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">About YourBrand</h2>
                        <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                            Founded in 2010, YourBrand has been at the forefront of innovative software solutions. Our
                            mission is to empower businesses through cutting-edge technology that transforms operations,
                            enhances productivity, and drives sustainable growth.
                        </p>
                        <div class="grid md:grid-cols-3 gap-6">
                            <div>
                                <h3 class="text-3xl font-bold text-[#FF2D20]">10+</h3>
                                <p class="text-gray-600">Years of Innovation</p>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold text-[#FF2D20]">500+</h3>
                                <p class="text-gray-600">Clients Served</p>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold text-[#FF2D20]">50+</h3>
                                <p class="text-gray-600">Team Members</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="bg-[#FF2D20]/10 absolute inset-0 -rotate-6 rounded-2xl"></div>
                        <img src="/images/Office_600_400.png" alt="YourBrand Office"
                            class="relative rounded-2xl shadow-xl z-10 object-cover w-full h-full" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div id="products" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="bg-[#FF2D20]/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#FF2D20]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Products</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Powerful, innovative solutions designed to drive your business forward. Explore our
                        comprehensive suite of cutting-edge products.
                    </p>
                </div>
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-all group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20] mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Business Suite</h3>
                        <p class="text-gray-600 mb-4">Comprehensive software solution for seamless business management
                            and collaboration.</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            Learn More →
                        </a>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-all group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20] mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h3a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Enterprise Solutions</h3>
                        <p class="text-gray-600 mb-4">Scalable enterprise-grade solutions tailored to meet complex
                            organizational needs.</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            Learn More →
                        </a>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-all group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20] mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Analytics Platform</h3>
                        <p class="text-gray-600 mb-4">Advanced data analytics tools to transform raw data into
                            actionable business insights.</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            Learn More →
                        </a>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-all group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20] mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                        </svg>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Cloud Services</h3>
                        <p class="text-gray-600 mb-4">Secure, scalable cloud infrastructure and hosting solutions for
                            modern businesses.</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Careers Section -->
        <div id="careers" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="bg-[#FF2D20]/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#FF2D20]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Join Our Team</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        We're always looking for talented, passionate individuals who want to make a difference. At
                        YourBrand, we offer more than just a job – we provide a platform for growth, innovation, and
                        personal development.
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-all group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20] mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Tech Roles</h3>
                        <p class="text-gray-600 mb-4">Software Engineers, Data Scientists, Cloud Architects</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            View Open Positions →
                        </a>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-all group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20] mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Business Roles</h3>
                        <p class="text-gray-600 mb-4">Sales, Marketing, Product Management</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            View Open Positions →
                        </a>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-all group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20] mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Support Roles</h3>
                        <p class="text-gray-600 mb-4">Customer Success, HR, Administrative</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            View Open Positions →
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Press Section -->
        <div id="press" class="py-24 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="bg-[#FF2D20]/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#FF2D20]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2V3L3 7l2 4V5h10v14H5" />
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">In the News</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        YourBrand continues to make waves in the tech industry. Check out our latest press coverage and
                        media mentions.
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all group">
                        <div class="overflow-hidden rounded-lg mb-6">
                            <img src="/images/Press_400_200_1.png" alt="Press Feature"
                                class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform" />
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Tech Innovators Magazine</h3>
                        <p class="text-gray-600 mb-4">YourBrand Named Top Emerging Tech Company</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            Read Article →
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all group">
                        <div class="overflow-hidden rounded-lg mb-6">
                            <img src="/images/Press_400_200_3.png" alt="Press Feature"
                                class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform" />
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Business Weekly</h3>
                        <p class="text-gray-600 mb-4">Revolutionary Software Solutions Disrupting Industry</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            Read Article →
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all group">
                        <div class="overflow-hidden rounded-lg mb-6">
                            <img src="/images/Press_400_200_2.png" alt="Press Feature"
                                class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform" />
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Startup Insider</h3>
                        <p class="text-gray-600 mb-4">Exclusive Interview with YourBrand CEO</p>
                        <a href="#" class="text-[#FF2D20] hover:underline group-hover:ml-2 transition-all">
                            Read Article →
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div id="contact" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="bg-[#FF2D20]/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#FF2D20]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">Contact Us</h2>
                        <p class="text-gray-600 text-lg mb-8">
                            Have a question or want to discuss how YourBrand can transform your business? Reach out to
                            our team, and we'll get back to you as soon as possible.
                        </p>
                        <div class="space-y-6">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FF2D20] mr-4"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-gray-700">+1 (555) 123-4567</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FF2D20] mr-4"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-gray-700">contact@yourbrand.com</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FF2D20] mr-4"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="text-gray-700">123 Tech Lane, Innovation City, ST 12345</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <form class="bg-gray-50 p-8 rounded-xl shadow-md">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Send Us a Message</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-gray-700 mb-2" for="name">Full Name</label>
                                    <input type="text" id="name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF2D20]/50"
                                        placeholder="Your Name" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2" for="email">Email Address</label>
                                    <input type="email" id="email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF2D20]/50"
                                        placeholder="you@example.com" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2" for="message">Your Message</label>
                                    <textarea id="message" rows="4"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF2D20]/50"
                                        placeholder="How can we help you?" required></textarea>
                                </div>
                                <button type="submit"
                                    class="w-full bg-[#FF2D20] text-white py-3 rounded-lg hover:bg-[#FF2D20]/90 transition-colors">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                    <!-- Brand Section -->
                    <div>
                        <div class="flex items-center space-x-4 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#FF2D20]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <span class="text-2xl font-bold">YourBrand</span>
                        </div>
                        <p class="text-gray-400 mb-6">
                            Empowering businesses with innovative software solutions that drive growth and efficiency.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-twitter text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-linkedin text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-github text-2xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Product Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Products</h4>
                        <ul class="space-y-4">
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Business
                                    Suite</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Enterprise
                                    Solutions</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Analytics
                                    Platform</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Cloud
                                    Services</a></li>
                        </ul>
                    </div>

                    <!-- Company Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Company</h4>
                        <ul class="space-y-4">
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About
                                    Us</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Careers</a>
                            </li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Press</a>
                            </li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Stay Updated</h4>
                        <p class="text-gray-400 mb-4">
                            Subscribe to our newsletter for the latest updates and insights.
                        </p>
                        <div class="flex">
                            <input type="email" placeholder="Enter your email"
                                class="w-full px-4 py-2 rounded-l-md bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#FF2D20]" />
                            <button
                                class="bg-[#FF2D20] text-white px-4 py-2 rounded-r-md hover:bg-[#e02717] transition-colors">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="mt-12 pt-8 border-t border-gray-800 text-center">
                    <p class="text-gray-400">&copy; 2024 YourBrand. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</x-layout>
