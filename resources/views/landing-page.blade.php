@extends('layouts.app')
@section('landing-page')
    <header class="w-full bg-yellow-400">
        <nav class="z-20 top-0 left-0">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-4 md:px-14 px-4">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('/assets/images/LOGO_KOTA_GORONTALO.png') }}" class="md:h-10 sm:h-9 h-6 mr-2"
                        alt="Inspektorat Gorontalo">
                    <div class="sm:flex flex flex-col">
                        <span
                            class="md:text-lg sm:text-base text-sm font-bold whitespace-nowrap text-white">INSPEKTORAT</span>
                        <span
                            class="self-center md:text-xl sm:text-xl text-base -mt-2 font-bold whitespace-nowrap text-white">KOTA
                            GORONTALO</span>
                    </div>
                </a>
                @auth
                    <div class="sm:flex sm:items-center sm:ml-6">

                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white bg-transparent font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">{{ auth()->user()->name }}<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="/dashboard"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                @else
                    <div class="flex md:order-2">
                        <a href="/login"
                            class="text-white outline-1 outline hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">Log
                            in</a>
                    </div>
                @endauth
        </nav>
    </header>


    <section class="bg-white relative">
        <div class="py-8 pl-4 pr-2 mx-auto max-w-screen-xl lg:py-16">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="p-8 md:p-12" data-aos="fade-right" data-aos-duration="1000">
                    <p
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                        </svg>
                        Pungutan Liar
                    </p>
                    <p
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                        </svg>
                        Gratifikasi
                    </p>
                    <h2 class="text-gray-900 dark:text-white md:text-4xl text-2xl font-extrabold mb-2">Selamat Datang ...
                    </h2>
                    <p class="md:text-xl text-base font-normal text-gray-500 dark:text-gray-400 mb-4">Sistem Informasi
                        Perjalanan Dinas Inspektorat Kota Gorontalo.
                        <span class="text-red-400">Pegawai yang sedang perjalanan dinas ditandai dengan </span>
                        <span class="inline-flex w-3 h-3 bg-green-500 rounded-full"></span>
                    </p>
                    <a href="#tabel-perjalanan-dinas"
                        class="text-blue-600 dark:text-yellow-500 hover:underline font-medium text-lg inline-flex items-center">Lihat daftar
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                <div class="p-8 md:p-12 flex justify-center" data-aos="fade-left" data-aos-duration="1000">
                    <img class="h-80 max-w-full" src="{{ asset('/assets/images/computer.png') }}" alt="image description">
                </div>
            </div>
        </div>
    </section>

    <section id="tabel-perjalanan-dinas" class="bg-gray-50 overflow-hidden">
        <div class="max-w-screen-xl px-6 py-8 mx-auto lg:py-24 lg:px-6">
            @if (count($dinas))
                <div class="w-full rounded-xl border border-gray-200" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="relative overflow-x-auto bg-white sm:rounded-xl pb-14">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-xl font-semibold text-left text-yellow-500 bg-gray-50 dark:text-white dark:bg-gray-800">
                                Daftar Pegawai
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Daftar pegawai yang
                                    sedang perjalanan dinas.</p>
                            </caption>
                            <thead
                                class="text-xs text-gray-700 border-y border-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Mulai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Berakhir
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dinas as $d)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 hover:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $d->pegawai->name }}
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $d->start }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $d->end }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex w-3 h-3 bg-green-500 rounded-full"></span>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-2">
                    @if ($dinas instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $dinas->links() }}
                    @endif
                </div>
            @else
                <div class="w-full mt-4 bg-gray-50 border-2 border-gray-200 rounded-lg">
                    <div class="flex flex-col justify-center items-center  h-72">
                        <div class="bg-amber-600 rounded-full px-4 pt-1 pb-2 mb-3">
                            <span class="text-3xl text-white">&times;</span>
                        </div>
                        <h1 class="text-amber-600">Belum ada pegawai yang melakukan perjalanan dinas.</h1>
                    </div>

                </div>
            @endif

        </div>
    </section>
    @include('layouts.partials.footer-landing-page')
    @include('layouts.partials.footer')
    @include('layouts.partials.end')
@endsection
