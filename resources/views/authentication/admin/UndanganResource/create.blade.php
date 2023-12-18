<div class="col-span-2 row-span-1 bg-gray-100 shadow-md rounded-lg">
    <h1 class="bg-yellow-400 rounded-t-lg py-2 px-5 font-semibold text-white">Arsip Undangan</h1>
    <div class="p-5">
        <form method="POST" action="{{ route('undangan.store') }}" enctype="multipart/form-data" class="mb-0">
            @csrf

            <div class="mt-4 mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="undangan">Upload Undangan</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="undangan" name="undangan" type="file">
                    {{-- @error('undangan')
                        <p></p>
                    @enderror --}}
            </div>

            <button type="submit"
                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Kirim</button>
        </form>
    </div>
</div>
