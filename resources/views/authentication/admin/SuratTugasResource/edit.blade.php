@extends('layouts.main')
@section('content')
    <div class="md:grid md:space-y-0 space-y-4 grid-cols-7 gap-5">
        <div class="col-span-2 row-span-1 bg-gray-100 shadow-md rounded-lg">
            <h1 class="bg-yellow-400 rounded-t-lg py-2 px-5 font-semibold text-white">Ubah Surat Tugas</h1>
            <div class="p-5">
                <form method="POST" action="{{ route('surat-tugas.update', ['surat_tuga' => $surat_tuga->id]) }}" enctype="multipart/form-data" class="mb-0">
                    @csrf
                    @method('put')
                    <div>
                        <label for="penerima"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerima</label>
                        <select id="penerima" name="user_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" required>
                            <option disabled selected>Pilih...</option>
                            @foreach ($users as $user)
                                @if (old('user_id', $surat_tuga->user_id) === $user->id)
                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4 mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="surat_tugas">Upload
                            Surat Tugas</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="surat_tugas" name="surat_tugas" type="file">
                    </div>

                    <button type="submit"
                        class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Ubah</button>
                </form>
            </div>
        </div>
        @include('authentication.admin.SuratTugasResource.table-surat-tugas')
    </div>
@endsection
@include('layouts.partials.end')
