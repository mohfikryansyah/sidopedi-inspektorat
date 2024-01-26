<div class="col-span-2 row-span-1 bg-gray-100 shadow-md rounded-lg">
    <h1 class="bg-yellow-400 rounded-t-lg py-2 px-5 font-semibold text-white">Kirim Laporan</h1>
    <div class="p-5">
        <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data" class="mb-0">
            @csrf
            <div class="mb-5">
                <label for="pengirim"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengirim</label>
                <select id="pengirim" name="user_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500">
                    <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }}</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                    Laporan</label>
                <input type="text" id="judul" name="judul"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('judul')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="laporan">Upload
                    Laporan</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="laporan" name="laporan" type="file" aria-describedby="file_input_name">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF (MAX. 1MB).</p>
                @error('surat_tugas')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Kirim</button>
        </form>
    </div>
</div>
