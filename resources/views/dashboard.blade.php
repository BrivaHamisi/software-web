<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-gradient-to-r from-blue-600 to-purple-600 p-4 rounded-lg shadow-lg">
            <h2 class="text-3xl font-extrabold text-white tracking-wide">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-100 bg-white/20 px-3 py-1 rounded-full">
                    {{ __('Welcome, :name', ['name' => Auth::user()->name]) }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Quick Stats Overview with Refined Design --}}
            {{-- Quick Stats Overview --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                @php
                    $stats = [
                        [
                            'title' => 'Total Users',
                            'count' => $users->total(),
                            'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                            'color' => 'blue'
                        ],
                        [
                            'title' => 'New Users (30d)',
                            'count' => \App\Models\User::where('created_at', '>', now()->subDays(30))->count(),
                            'icon' => 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z',
                            'color' => 'green'
                        ],
                        [
                            'title' => 'Active Users',
                            'count' => \App\Models\User::where('last_login_at', '>', now()->subDays(7))->count(),
                            'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                            'color' => 'purple'
                        ],
                        [
                            'title' => 'Inactive Users',
                            'count' => \App\Models\User::where('last_login_at', '<', now()->subDays(30))->count(),
                            'icon' => 'M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zm-9.838 7.61a1.001 1.001 0 001.316-.986V6a1 1 0 00-1-1h-.807a1 1 0 00-1 1v5.617a1.001 1.001 0 00.684.949zM12 14a1 1 0 100-2 1 1 0 000 2z',
                            'color' => 'red'
                        ]
                    ];
                @endphp

                @foreach($stats as $stat)
                    <div class="bg-white shadow-lg rounded-xl p-6 border-l-4 border-{{ $stat['color'] }}-500 
                        transform hover:scale-105 transition duration-300 ease-in-out 
                        hover:shadow-xl group">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-gray-500 text-sm uppercase tracking-wider">{{ $stat['title'] }}</h3>
                                <p class="text-3xl font-bold text-gray-800 group-hover:text-{{ $stat['color'] }}-600 transition">
                                    {{ $stat['count'] }}
                                </p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-{{ $stat['color'] }}-400 group-hover:text-{{ $stat['color'] }}-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- User Management Section with Enhanced Design --}}
                <div class="md:col-span-2 bg-white shadow-xl rounded-xl overflow-hidden 
                    border-t-4 border-indigo-500 hover:shadow-2xl transition duration-300">
                    <div class="px-6 py-5 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            {{ __('User Management') }}
                        </h3>
                        <div class="flex items-center space-x-4">
                            <input type="text" placeholder="Search users..." class="form-input rounded-lg border-gray-300 text-sm 
                                focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 
                                transition duration-300 ease-in-out shadow-sm">
                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg 
                                hover:bg-indigo-700 focus:outline-none focus:ring-2 
                                focus:ring-indigo-500 focus:ring-offset-2 
                                transition duration-300 ease-in-out transform hover:scale-105">
                                {{ __('Add User') }}
                            </button>
                        </div>
                    </div>

                    {{-- User Table --}}
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th class="px-6 py-3 text-left">#</th>
                                    <th class="px-6 py-3">{{ __('Name') }}</th>
                                    <th class="px-6 py-3">{{ __('Email') }}</th>
                                    <th class="px-6 py-3">{{ __('Joined') }}</th>
                                    <th class="px-6 py-3 text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out 
                                        hover:shadow-lg hover:scale-[1.01]">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $user->id }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 mr-4">
                                                    <div class="h-10 w-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $user->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $user->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div class="flex justify-end space-x-3">
                                                <a href="#" class="text-blue-600 hover:text-blue-900 transition duration-300 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <a href="#" class="text-green-600 hover:text-green-900 transition duration-300 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <a href="#" class="text-red-600 hover:text-red-900 transition duration-300 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                @if($users->hasPages())
                <div class="bg-white px-4 py-3 justify-between border-t border-gray-200 sm:px-6">
                    {{ $users->links() }}
                </div>
                @endif
                </div>

                {{-- Sidebar with Enhanced Design --}}
                <div class="space-y-6">
                    {{-- Recent Activity Card with Modern Design --}}
                    <div class="bg-white shadow-lg rounded-xl p-6 
                        border-l-4 border-green-500 hover:shadow-xl transition duration-300">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800 
                            flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            Recent Activity
                        </h3>

                        <ul class="space-y-4">
                            <li class="flex items-center space-x-3">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-green-500 flex items-center justify-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        New user registration
                                    </p>
                                    <p class="text-xs text-gray-500 truncate">
                                        John Doe signed up 10 mins ago
                                    </p>
                                </div>
                                <span class="text-xs text-gray-500">Just now</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.766A2.25 2.25 0 008.828 17h2.344a2.25 2.25 0 001.789-.894l2.395-3.189a2 2 0 00.346-1.244V9.997a2 2 0 00-2-2h-1z" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        Profile update
                                    </p>
                                    <p class="text-xs text-gray-500 truncate">
                                        Jane Smith updated profile details
                                    </p>
                                </div>
                                <span class="text-xs text-gray-500">30 mins</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-red-500 flex items-center justify-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        Account deactivated
                                    </p>
                                    <p class="text-xs text-gray-500 truncate">
                                        User Mike Johnson deactivated
                                    </p>
                                </div>
                                <span class="text-xs text-gray-500">2 hrs</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Other sidebar sections would follow similar design principles --}}
                    {{-- User Growth Chart --}}
                <div class="bg-white shadow-lg rounded-xl p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">User Growth</h3>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-500">Last 30 Days</p>
                            <p class="text-2xl font-bold text-green-600">+{{ \App\Models\User::where('created_at', '>', now()->subDays(30))->count() }} Users</p>
                        </div>
                        <div class="text-right">
                            <span class="text-green-600 text-sm inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                12.5%
                            </span>
                        </div>
                    </div>
                    <div class="h-24 w-full bg-gray-100 rounded-lg flex items-center justify-center text-gray-500">
                        {{ __('Growth Chart Placeholder') }}
                    </div>
                </div>
                
                {{-- User Roles Distribution --}}
                <div class="bg-white shadow-lg rounded-xl p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">User Roles</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <span class="h-3 w-3 rounded-full bg-blue-500"></span>
                                <span class="text-sm text-gray-700">Admin</span>
                            </div>
                            <span class="text-sm font-medium text-gray-900">
                                {{ \App\Models\User::where('role', 'admin')->count() }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <span class="h-3 w-3 rounded-full bg-green-500"></span>
                                <span class="text-sm text-gray-700">Editor</span>
                            </div>
                            <span class="text-sm font-medium text-gray-900">
                                {{ \App\Models\User::where('role', 'editor')->count() }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <span class="h-3 w-3 rounded-full bg-purple-500"></span>
                                <span class="text-sm text-gray-700">User</span>
                            </div>
                            <span class="text-sm font-medium text-gray-900">
                                {{ \App\Models\User::where('role', 'user')->count() }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <span class="h-3 w-3 rounded-full bg-gray-500"></span> 
                                <span class="text-sm text-gray-700">Guest</span>
                            </div>
                            <span class="text-sm font-medium text-gray-900">
                                {{ \App\Models\User::where('role', 'guest')->count() }}
                            </span>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>