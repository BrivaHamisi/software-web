<x-layout>
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-900 min-h-screen flex flex-col">
        @include('components.header')
        <div className="mt-32"> 
            <div class="container mx-auto px-4 py-12">
                {{-- Page Header --}}
                <header class="mb-16 text-center">
                    <h1 class="text-4xl md:text-6xl font-extrabold bg-clip-text text-transparent 
                               bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 
                               mb-6 tracking-tight">
                        Tech Insights
                    </h1>
                    <p class="max-w-3xl mx-auto text-lg text-gray-300 leading-relaxed">
                        Explore cutting-edge perspectives at the intersection of technology, 
                        design, and innovation.
                    </p>
                </header>
        
                {{-- Blog Posts Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @php
                    $dummyPosts = [
                        [
                            'title' => 'The Future of Artificial Intelligence',
                            'excerpt' => 'Exploring the transformative potential of AI across industries and its impact on human creativity.',
                            'image' => 'https://via.placeholder.com/400x250?text=AI+Future',
                            'author_name' => 'Emma Rodriguez',
                            'author_avatar' => 'https://via.placeholder.com/40x40?text=ER',
                            'read_time' => 7,
                            'slug' => 'ai-future'
                        ],
                        [
                            'title' => 'Quantum Computing Breakthrough',
                            'excerpt' => 'Unraveling the latest advancements in quantum technology and its potential to revolutionize computing.',
                            'image' => 'https://via.placeholder.com/400x250?text=Quantum+Tech',
                            'author_name' => 'Alex Chen',
                            'author_avatar' => 'https://via.placeholder.com/40x40?text=AC',
                            'read_time' => 5,
                            'slug' => 'quantum-computing'
                        ],
                        [
                            'title' => 'Sustainable Tech Innovations',
                            'excerpt' => 'How emerging technologies are reshaping our approach to environmental challenges and sustainability.',
                            'image' => 'https://via.placeholder.com/400x250?text=Green+Tech',
                            'author_name' => 'Kai Martinez',
                            'author_avatar' => 'https://via.placeholder.com/40x40?text=KM',
                            'read_time' => 6,
                            'slug' => 'sustainable-tech'
                        ],
                        [
                            'title' => 'Blockchain Beyond Cryptocurrency',
                            'excerpt' => 'Exploring innovative applications of blockchain technology in various sectors beyond financial markets.',
                            'image' => 'https://via.placeholder.com/400x250?text=Blockchain',
                            'author_name' => 'Riley Nakamura',
                            'author_avatar' => 'https://via.placeholder.com/40x40?text=RN',
                            'read_time' => 8,
                            'slug' => 'blockchain-applications'
                        ],
                        [
                            'title' => 'The Rise of Edge Computing',
                            'excerpt' => 'Understanding how edge computing is transforming data processing and enabling real-time innovations.',
                            'image' => 'https://via.placeholder.com/400x250?text=Edge+Computing',
                            'author_name' => 'Jordan Kim',
                            'author_avatar' => 'https://via.placeholder.com/40x40?text=JK',
                            'read_time' => 6,
                            'slug' => 'edge-computing'
                        ],
                        [
                            'title' => 'Augmented Reality in Education',
                            'excerpt' => 'Examining the potential of AR technologies to revolutionize learning and educational experiences.',
                            'image' => 'https://via.placeholder.com/400x250?text=AR+Education',
                            'author_name' => 'Sophia Patel',
                            'author_avatar' => 'https://via.placeholder.com/40x40?text=SP',
                            'read_time' => 5,
                            'slug' => 'ar-in-education'
                        ]
                    ];
                    @endphp
        
                    @foreach($dummyPosts as $post)
                        <article class="group relative overflow-hidden 
                                        border border-slate-800/50 
                                        rounded-2xl 
                                        bg-slate-800/30 
                                        backdrop-blur-sm 
                                        transition-all 
                                        duration-300 
                                        hover:border-cyan-500/30 
                                        hover:shadow-2xl 
                                        hover:scale-[1.02]">
                            <div class="absolute inset-0 
                                        bg-gradient-to-br 
                                        from-cyan-500/10 
                                        to-purple-500/10 
                                        opacity-0 
                                        group-hover:opacity-100 
                                        transition-opacity 
                                        duration-500 
                                        z-0">
                            </div>
        
                            <div class="relative p-6 flex flex-col h-full z-10">
                                {{-- Post Image --}}
                                <div class="mb-6 overflow-hidden rounded-xl">
                                    <img 
                                        src="{{ $post['image'] }}" 
                                        alt="{{ $post['title'] }}"
                                        class="w-full h-56 object-cover 
                                               transform transition-transform 
                                               duration-500 
                                               group-hover:scale-110"
                                    >
                                </div>
        
                                {{-- Post Title --}}
                                <h2 class="text-2xl font-bold 
                                           text-white 
                                           mb-4 
                                           group-hover:text-cyan-300 
                                           transition-colors">
                                    {{ $post['title'] }}
                                </h2>
        
                                {{-- Post Excerpt --}}
                                <p class="text-gray-300 
                                          mb-6 
                                          flex-grow 
                                          line-clamp-3">
                                    {{ $post['excerpt'] }}
                                </p>
        
                                {{-- Post Meta --}}
                                <div class="flex justify-between items-center mt-auto">
                                    <div class="flex items-center space-x-3">
                                        <img 
                                            src="{{ $post['author_avatar'] }}" 
                                            alt="{{ $post['author_name'] }}"
                                            class="w-10 h-10 rounded-full 
                                                   border-2 border-slate-700"
                                        >
                                        <span class="text-sm text-gray-400">
                                            {{ $post['author_name'] }}
                                        </span>
                                    </div>
        
                                    <div class="flex items-center space-x-2 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" 
                                             class="h-5 w-5" 
                                             viewBox="0 0 24 24" 
                                             fill="none" 
                                             stroke="currentColor">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        <span class="text-sm">
                                            {{ $post['read_time'] }} min read
                                        </span>
                                    </div>
                                </div>
        
                                {{-- Read More Button --}}
                                <a href="#" 
                                   class="absolute bottom-4 right-4 
                                          bg-cyan-500/20 
                                          hover:bg-cyan-500/40 
                                          p-2 
                                          rounded-full 
                                          transition-all 
                                          group-hover:opacity-100 
                                          opacity-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                         class="h-6 w-6 text-white" 
                                         fill="none" 
                                         viewBox="0 0 24 24" 
                                         stroke="currentColor">
                                        <path stroke-linecap="round" 
                                              stroke-linejoin="round" 
                                              stroke-width="2" 
                                              d="M14 5l7 7m0 0l-7 7m7-7H3">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
            @include('components.footer')
        </div>
    </div>

    <div class="container mx-auto px-4 py-12 mt-16">
        {{-- Animated Page Header --}}
        <header class="mb-16 text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/20 via-blue-500/20 to-purple-600/20 
                        animate-pulse opacity-50 blur-3xl"></div>
            
            <h1 class="relative text-4xl md:text-6xl font-extrabold bg-clip-text text-transparent 
                       bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 
                       mb-6 tracking-tight
                       transform hover:scale-105 transition-transform duration-500">
                Tech Insights
            </h1>
            
            <p class="relative max-w-3xl mx-auto text-lg text-gray-300 leading-relaxed 
                      opacity-80 hover:opacity-100 transition-opacity duration-300">
                Explore cutting-edge perspectives at the intersection of technology, 
                design, and innovation.
            </p>
        </header>

        {{-- Enhanced Blog Posts Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
            $featuredPost = array_shift($dummyPosts);
            $regularPosts = $dummyPosts;
            @endphp
            
            {{-- Featured Post --}}
            <article class="md:col-span-3 group relative overflow-hidden 
                            border border-slate-700/50 
                            rounded-3xl 
                            bg-slate-800/40 
                            backdrop-blur-lg 
                            transform transition-all 
                            duration-500 
                            hover:border-cyan-500/50 
                            hover:shadow-2xl 
                            hover:scale-[1.01]">
                <div class="grid md:grid-cols-2 gap-8 p-8">
                    <div class="overflow-hidden rounded-2xl">
                        <img 
                            src="{{ $featuredPost['image'] }}" 
                            alt="{{ $featuredPost['title'] }}"
                            class="w-full h-full object-cover 
                                   transform transition-transform 
                                   duration-700 
                                   group-hover:scale-110"
                        >
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="text-sm text-cyan-400 uppercase tracking-wider mb-3">
                            Featured Article
                        </span>
                        <h2 class="text-3xl font-bold text-white mb-4 
                                   group-hover:text-cyan-300 
                                   transition-colors">
                            {{ $featuredPost['title'] }}
                        </h2>
                        <p class="text-gray-300 mb-6 line-clamp-4">
                            {{ $featuredPost['excerpt'] }}
                        </p>
                        
                        <div class="flex items-center space-x-4">
                            <img 
                                src="{{ $featuredPost['author_avatar'] }}" 
                                alt="{{ $featuredPost['author_name'] }}"
                                class="w-12 h-12 rounded-full 
                                       border-2 border-slate-600"
                            >
                            <div>
                                <p class="text-white font-semibold">
                                    {{ $featuredPost['author_name'] }}
                                </p>
                                <p class="text-sm text-gray-400">
                                    {{ $featuredPost['read_time'] }} min read
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Regular Posts --}}
            @foreach($regularPosts as $post)
                <article class="group relative overflow-hidden 
                                border border-slate-800/50 
                                rounded-2xl 
                                bg-slate-800/30 
                                backdrop-blur-sm 
                                transition-all 
                                duration-300 
                                hover:border-cyan-500/30 
                                hover:shadow-2xl 
                                hover:scale-[1.02]">
                    <div class="absolute inset-0 
                                bg-gradient-to-br 
                                from-cyan-500/10 
                                to-purple-500/10 
                                opacity-0 
                                group-hover:opacity-100 
                                transition-opacity 
                                duration-500 
                                z-0">
                    </div>

                    <div class="relative p-6 flex flex-col h-full z-10">
                        {{-- Post Image --}}
                        <div class="mb-6 overflow-hidden rounded-xl">
                            <img 
                                src="{{ $post['image'] }}" 
                                alt="{{ $post['title'] }}"
                                class="w-full h-56 object-cover 
                                       transform transition-transform 
                                       duration-500 
                                       group-hover:scale-110"
                            >
                        </div>

                        {{-- Post Title --}}
                        <h2 class="text-2xl font-bold 
                                   text-white 
                                   mb-4 
                                   group-hover:text-cyan-300 
                                   transition-colors">
                            {{ $post['title'] }}
                        </h2>

                        {{-- Post Excerpt --}}
                        <p class="text-gray-300 
                                  mb-6 
                                  flex-grow 
                                  line-clamp-3">
                            {{ $post['excerpt'] }}
                        </p>

                        {{-- Post Meta --}}
                        <div class="flex justify-between items-center mt-auto">
                            <div class="flex items-center space-x-3">
                                <img 
                                    src="{{ $post['author_avatar'] }}" 
                                    alt="{{ $post['author_name'] }}"
                                    class="w-10 h-10 rounded-full 
                                           border-2 border-slate-700"
                                >
                                <span class="text-sm text-gray-400">
                                    {{ $post['author_name'] }}
                                </span>
                            </div>

                            <div class="flex items-center space-x-2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="h-5 w-5" 
                                     viewBox="0 0 24 24" 
                                     fill="none" 
                                     stroke="currentColor">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span class="text-sm">
                                    {{ $post['read_time'] }} min read
                                </span>
                            </div>
                        </div>

                        {{-- Read More Button --}}
                        <a href="#" 
                           class="absolute bottom-4 right-4 
                                  bg-cyan-500/20 
                                  hover:bg-cyan-500/40 
                                  p-2 
                                  rounded-full 
                                  transition-all 
                                  group-hover:opacity-100 
                                  opacity-0 
                                  hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="h-6 w-6 text-white" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke="currentColor">
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      stroke-width="2" 
                                      d="M14 5l7 7m0 0l-7 7m7-7H3">
                                </path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    
    @include('components.footer')
</x-layout>
