@include('layouts.app')
<main class="h-screen bg-gray-100">
    <div class="flex flex-col items-center justify-center px-6 mx-auto h-screen">
        <a href="/" class="flex items-center justify-center mb-8 text-2xl font-bold lg:mb-10">
            <img src="{{ asset('/assets/images/LOGO_KOTA_GORONTALO.png') }}" class="h-16 mr-4" alt="Inspektorat" />
        </a>
        <!-- Card -->
        <div class="w-full max-w-md p-6 space-y-3 sm:p-8 bg-gray-50 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-yellow-400">
                Reset Password
            </h2>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form class="mt-8 space-y-5" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="relative">
                    <input type="email" id="email" name="email"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-yellow-500 focus:outline-none focus:ring-0 focus:border-yellow-600 peer"
                        placeholder=" " required autofocus value="{{ old('email') }}" />
                    <label for="email"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-yellow-600 peer-focus:dark:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>

</main>
@include('layouts.partials.end')
