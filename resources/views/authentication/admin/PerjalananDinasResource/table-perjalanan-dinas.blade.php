@if (count($dinas))
    <div class="w-full rounded-xl mt-5 border border-gray-200">
        <div class="relative overflow-x-auto bg-white sm:rounded-xl pb-14">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-xl font-semibold text-left text-yellow-500 bg-gray-50 dark:text-white dark:bg-gray-800">
                    Daftar Pegawai
                    @role(['ADMIN', 'PEGAWAI'])
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Daftar pegawai yang sedang atau
                            tidak mengikuti perjalanan dinas.</p>
                    @else
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Daftar pegawai yang sedang perjalanan dinas.</p>
                    @endrole
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
                        @role('ADMIN')
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        @endrole
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
                                @role('ADMIN')
                                    <label class="relative items-center mr-5 cursor-pointer">
                                        <input type="checkbox" id="verified_{{ $d->id }}"
                                            data-dinas-id="{{ $d->id }}" class="sr-only peer"
                                            {{ $d->perjalanan_dinas ? 'checked' : '' }} onclick="toggleUserStatus(this)">
                                        <div
                                            class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400">
                                        </div>
                                    </label>
                                @else
                                    <span class="inline-flex w-3 h-3 bg-green-500 rounded-full"></span>
                                @endrole

                            </td>
                            @role('ADMIN')
                                <td class="px-6 py-4 flex items-center space-x-2">
                                    <a href="{{ route('perjalanan-dinas.edit', ['perjalanan_dina' => $d->id]) }}"
                                        class="text-blue-400 hover:text-blue-500">Ubah</a>
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        class="block text-red-400 font-medium rounded-lg text-sm text-center hover:text-red-500 duration-150"
                                        type="button">
                                        Hapus
                                    </button>

                                    <div id="popup-modal" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Apakah
                                                        anda yakin ingin menghapus laporan ini?</h3>
                                                    <div class="flex justify-center">
                                                        <form
                                                            action="{{ route('perjalanan-dinas.destroy', ['perjalanan_dina' => $d->id]) }}"
                                                            method="post" class="my-auto">
                                                            @csrf
                                                            @method('delete')
                                                            <button data-modal-hide="popup-modal" type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                Ya, Saya yakin!
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="popup-modal" type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,
                                                            batalkan!</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endrole
                            {{-- @include('livewire.components.modal-button') --}}
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
