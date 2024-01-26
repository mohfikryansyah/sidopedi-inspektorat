<div class="col-span-2 row-span-1 bg-gray-100 shadow-md rounded-lg">
    <h1 class="bg-yellow-400 rounded-t-lg py-2 px-5 font-semibold text-white">Arsip Undangan</h1>
    <div class="p-5">
        <form method="POST" action="{{ route('undangan.store') }}" enctype="multipart/form-data" class="mb-0">
            @csrf
            <div class="mb-5">
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                    Undangan</label>
                <input type="text" id="judul" name="judul"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('judul')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="undangan">Upload
                    Undangan</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="undangan" name="undangan" type="file" aria-describedby="file_input_help">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF (MAX. 1MB).</p>
                @error('undangan')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
</div>
