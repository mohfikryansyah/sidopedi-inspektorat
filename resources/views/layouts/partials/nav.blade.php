<nav class="bg-yellow-400 border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('/assets/images/LOGO_KOTA_GORONTALO.png') }}" class="h-8 mr-3" alt="Flowbite Logo" />
            {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
        </a>
        <div class="flex items-center ml-auto md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ asset('/assets/images/people.png') }}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-yellow-400 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-white dark:text-white">{{ Auth()->user()->name }}</span>
                    <span
                        class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth()->user()->email }}</span>
                </div>
                <ul class="pt-3" aria-labelledby="user-menu-button">
                    <li>
                        <a href="/"
                            class="block px-4 py-2 text-sm text-gray-100 hover:text-gray-700 hover:bg-gray-100">Landing Page</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="block px-4 py-2 text-sm text-gray-100 hover:text-gray-700 hover:bg-gray-100"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-yellow-400 md:bg-transparent bg-yellow-500 rounded-lg md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li class="md:px-3">
                    <a href="/dashboard"
                        class="{{ Request::is('dashboard') ? 'text-gray-50' : 'text-gray-800' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-50 md:p-0 duration-200"
                        aria-current="page">Dashboard</a>
                </li>
                @role('ADMIN')
                <li>
                    <a href="{{ route('undangan.index') }}"
                        class="{{ Request::is('undangan') ? 'text-gray-50' : 'text-gray-800' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-50 md:p-0 duration-200">Undangan</a>
                </li>
                @endrole
                <li>
                    <a href="{{ route('surat-tugas.index') }}"
                        class="{{ Request::is('surat-tugas') ? 'text-gray-50' : 'text-gray-800' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-50 md:p-0 duration-200">Surat
                        Tugas</a>
                </li>

                <li>
                    <a href="{{ route('laporan.index') }}"
                        class="{{ Request::is('laporan') ? 'text-gray-50' : 'text-gray-800' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-50 md:p-0 duration-200">Laporan</a>
                </li>

                @role('ADMIN')
                    <li>
                        <a href="{{ route('perjalanan-dinas.index') }}"
                            class="{{ Request::is('perjalanan-dinas') ? 'text-gray-50' : 'text-gray-800' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-50 md:p-0 duration-200">Perjalanan
                            Dinas</a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}"
                            class="{{ Request::is('users') ? 'text-gray-50' : 'text-gray-800' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-50 md:p-0 duration-200">Users</a>
                    </li>
                @endrole
            </ul>
        </div>
    </div>
</nav>
