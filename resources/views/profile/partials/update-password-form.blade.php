<section>
    <header>
        <h2 class="text-lg font-medium text-[#4682A9] font-concert">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-[#4682A9] font-concert">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-600 font-concert">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="mt-1 p-2 block w-full  rounded-md text-[#4682A9] border-4 border-[#4682A9]" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <label for="update_password_password" class="block text-sm font-medium text-gray-600 font-concert">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="mt-1 p-2 block w-full  rounded-md text-[#4682A9] border-4 border-[#4682A9]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-600 font-concert">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 p-2 block w-full  rounded-md text-[#4682A9] border-4 border-[#4682A9]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
            <p data-show="true" style="display: true;" id="password-update-status" class="font-concert text-sm text-gray-600">
                {{ __('Saved.') }}</p>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function() {
                        document.getElementById('password-update-status').style.display = 'none';
                    }, 2000);
                });
            </script>
            @endif
        </div>
    </form>
</section>