<div class="col-span-5">
    <div class="relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-50 uppercase bg-yellow-400 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Undangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    @role('ADMIN')
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @forelse ($undangans as $undangan)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4">
                            <a href="{{ asset('storage/' . $undangan->undangan) }}" class="text-blue-600">Lihat</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $undangan->created_at }}
                        </td>
                        @role('ADMIN')
                            <td class="px-6 py-4 flex items-center space-x-2">
                                <a href="{{ route('undangan.edit', ['undangan' => $undangan->id]) }}"
                                    class="font-medium text-green-400 hover:text-green-500 duration-150">Ubah</a>
                                <form action="{{ route('undangan.destroy', ['undangan' => $undangan->id]) }}" method="post"
                                    class="my-auto">
                                    @csrf
                                    @method('delete')
                                    <button class="hover:text-red-500 duration-150">Hapus</button>
                                </form>
                            </td>
                        @endrole
                    </tr>
                @empty
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" colspan="4"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            Kosong
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
