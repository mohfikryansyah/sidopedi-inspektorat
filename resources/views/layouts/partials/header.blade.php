<div class="w-full bg-gray-100 py-5 border-b-2 border-b-gray-200">
    <div class="max-w-screen-xl mx-auto px-3 flex justify-between">
        <h1 class="font-bold lg:text-3xl md:text-2xl text-xl">Dashboard
            @isset($header)
                {{ '> ' . $header }}
            @endisset
        </h1>
        @role('PEGAWAI')
            @if (auth()->check())
                @if ($latest = auth()->user()->dinas()->latest()->first())
                    @if ($latest->perjalanan_dinas === true)
                        <span
                            class="inline-flex items-center bg-green-200 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                            <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                            Perjalanan Dinas
                        </span>
                    @else
                        <span
                            class="inline-flex items-center bg-red-200 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                            <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                            Perjalanan Dinas
                        </span>
                    @endif
                @endif
            @endif
        @endrole
    </div>
</div>
