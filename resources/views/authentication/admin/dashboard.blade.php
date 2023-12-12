@extends('layouts.main')
@section('content')
    <div class="flex md:flex-row flex-col md:space-x-4 md:space-y-0 space-y-4 justify-center">
        <div
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
            <div class="bg-yellow-500 w-full font-medium p-2 text-gray-100 text-center"></div>
            <div class="flex flex-col items-center pb-10 mt-5">
                <div class="w-24 h-24 mb-3 rounded-full shadow-lg flex items-center justify-center">
                    <h1 class="font-bold text-5xl">{{ count(\App\Models\Dinas::where('perjalanan_dinas', true)->get()) }}
                    </h1>
                </div>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Total</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">Pegawai yang sedang melakukan perjalanan dinas.</span>
                <div class="flex mt-4 md:mt-6">
                    <a href="{{ route('perjalanan-dinas.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lihat
                        selengkapnya...</a>
                    {{-- <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Message</a> --}}
                </div>
            </div>
        </div>
        <div
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
            <div class="bg-yellow-500 w-full font-medium p-2 text-gray-100 text-center"></div>
            <div class="flex flex-col items-center pb-10 mt-5">
                <div class="w-24 h-24 mb-3 rounded-full shadow-lg flex items-center justify-center">
                    <h1 class="font-bold text-5xl">{{ count(\App\Models\SuratTugas::all()) }}</h1>
                </div>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Total</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">Surat Tugas yang dikirim.</span>
                <div class="flex mt-4 md:mt-6">
                    <a href="{{ route('surat-tugas.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lihat
                        selengkapnya...</a>
                    {{-- <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Message</a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@include('layouts.partials.end')
