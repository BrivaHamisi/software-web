<section class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-900 p-6 rounded-lg max-w-md mx-auto space-y-6">
    <header class="mb-6">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-lg text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button 
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition-all shadow-md hover:shadow-lg"
    >
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-lg text-gray-600 mb-6">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mb-6">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 mb-1" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-600" />
            </div>

            <div class="flex justify-end space-x-4">
                <button 
                    type="button" 
                    x-on:click="$dispatch('close')"
                    class="px-6 py-2 text-gray-700 bg-gray-200 rounded-full hover:bg-gray-300 transition-all"
                >
                    {{ __('Cancel') }}
                </button>

                <button 
                    type="submit"
                    class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition-all shadow-md hover:shadow-lg"
                >
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>