<section class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-900 p-6 rounded-lg max-w-md mx-auto">
    <header class="mb-6">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">
            {{ __('Update Password') }}
        </h2>

        <p class="text-lg text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-gray-700 mb-1" />
            <x-text-input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#FF2D20]/50 focus:border-[#FF2D20] transition-all" 
                autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-600" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-gray-700 mb-1" />
            <x-text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#FF2D20]/50 focus:border-[#FF2D20] transition-all" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-600" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-gray-700 mb-1" />
            <x-text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#FF2D20]/50 focus:border-[#FF2D20] transition-all" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center gap-4">
            <button 
                type="submit" 
                class="bg-[#FF2D20] text-white px-6 py-2 rounded-full hover:bg-[#e02717] transition-all shadow-md hover:shadow-lg"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
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