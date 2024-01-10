<section class="space-y-6 ">
    <header>
        <h2 class="font-concert text-lg font-medium text-[#4682A9] ">
            {{ __('Delete Account') }}
        </h2>

        <p class="font-concert mt-1 text-sm text-[#4682A9]">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" onclick="confirmUserDeletion()" class="font-concert bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
        {{ __('Delete Account') }}
    </button>

    <div id="confirm-user-deletion-modal" class="hidden fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                        <input id="password" name="password" type="password" class="mt-1 block w-3/4 p-2 border rounded-md" placeholder="{{ __('Password') }}" />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="button" onclick="closeUserDeletionModal()" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            {{ __('Cancel') }}
                        </button>

                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ms-3">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmUserDeletion() {
            document.getElementById('confirm-user-deletion-modal').classList.remove('hidden');
        }

        function closeUserDeletionModal() {
            document.getElementById('confirm-user-deletion-modal').classList.add('hidden');
        }
    </script>
</section>