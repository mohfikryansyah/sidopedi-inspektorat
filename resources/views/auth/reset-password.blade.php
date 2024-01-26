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
            <form class="mt-8 space-y-5" method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="relative">
                    <input type="email" id="email" name="email"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-yellow-500 focus:outline-none focus:ring-0 focus:border-yellow-600 peer"
                        placeholder=" " required autofocus autocomplete="username"
                        value="{{ old('email', $request->email) }}" />
                    <label for="email"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-yellow-600 peer-focus:dark:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="relative">
                    <input type="password" id="password" name="password"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-yellow-500 focus:outline-none focus:ring-0 focus:border-yellow-600 peer"
                        placeholder=" " autocomplete="new-password" value="{{ old('password') }}" />
                    <label for="password"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-yellow-600 peer-focus:dark:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Password baru</label>
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-yellow-500 focus:outline-none focus:ring-0 focus:border-yellow-600 peer"
                        placeholder=" " autocomplete="new-password" />
                    <label for="password"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-yellow-600 peer-focus:dark:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Confirm
                        Password</label>
                    @error('password_confirmation')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>

</main>
@include('layouts.partials.end')
