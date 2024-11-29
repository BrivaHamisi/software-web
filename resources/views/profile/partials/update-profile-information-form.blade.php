<section class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-900 p-6 rounded-lg max-w-md mx-auto">
    <header class="mb-6">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-lg text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-700 mb-1" />
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#FF2D20]/50 focus:border-[#FF2D20] transition-all" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error class="mt-2 text-red-600" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 mb-1" />
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#FF2D20]/50 focus:border-[#FF2D20] transition-all" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username" 
            />
            <x-input-error class="mt-2 text-red-600" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="bg-yellow-50 border border-yellow-200 rounded-md p-3 mt-4">
                    <p class="text-sm text-yellow-800">
                        {{ __('Your email address is unverified.') }}

                        <button 
                            form="send-verification" 
                            class="ml-2 text-[#FF2D20] hover:underline focus:outline-none focus:ring-2 focus:ring-[#FF2D20]/50"
                        >
                            {{ __('Re-send verification email') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button 
                type="submit" 
                class="bg-[#FF2D20] text-white px-6 py-2 rounded-full hover:bg-[#e02717] transition-all shadow-md hover:shadow-lg"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>