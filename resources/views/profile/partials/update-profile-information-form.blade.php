<section class="p-0">
    <header>
        <h2 class="text-[#4682A9] text-lg font-medium font-concert">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-[#4682A9] mt-1 text-sm  font-concert">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update', $user->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600 font-concert">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="font-concert mt-1 p-2 block w-full  rounded-md border-4 border-[#4682A9] text-[#4682A9]" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
            <p class="mt-2 text-sm text-red-500 font-concert">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600 font-concert">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="mt-1 p-2 block w-full  rounded-md font-concert border-4 border-[#4682A9] text-[#4682A9]" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
            <p class="mt-2 text-sm text-red-500 font-concert">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800 font-concert">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-concert">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600 font-concert">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>
        <div class="mb-4">
            <label for="user_image" class="block text-sm font-medium text-gray-600 font-concert">{{ __('User Image') }}</label>
            <input id="user_image" name="user_image" type="file" value="{{ old('user_image', $user->user_image) }}" class="mt-1 p-2 block w-full  rounded-md font-concert border-4 border-[#4682A9] text-[#4682A9]" />
            @error('user_image')
            <p class="mt-2 text-sm text-red-500 font-concert">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="user_about" class="block text-sm font-medium text-gray-600 font-concert">{{ __('User About') }}</label>
            <textarea id="user_about" name="user_about" rows="4" value="{{ old('user_about', $user->user_about) }}" class="block p-2.5 w-full font-concert tracking-wide font-normal  text-[#4682A9] bg-white rounded-lg border-4 border-[#4682A9] focus:ring-black focus:ring-0" placeholder="Write about yourself..." required>{{ $user->user_about }}</textarea>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded font-concert">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
            <p data-show="true" style="display: true;" id="status-message" class="text-sm text-gray-600 font-concert">
                {{ __('Saved.') }}</p>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function() {
                        document.getElementById('status-message').style.display = 'none';
                    }, 2000);
                });
            </script>
            @endif
        </div>
    </form>
</section>