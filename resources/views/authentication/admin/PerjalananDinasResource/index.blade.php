@extends('layouts.main')
@section('content')
    @include('layouts.partials.alert-success')
    <a href="{{ route('perjalanan-dinas.create') }}"
        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Tambahkan</a>
    <div class="mt-6">

        @include('layouts.partials.search-input')
    </div>
    @include('authentication.admin.PerjalananDinasResource.table-perjalanan-dinas')

    <script>
        function toggleUserStatus(checkbox) {
            var userId = checkbox.getAttribute('data-dinas-id');
            var isActive = checkbox.checked;

            // Kirim permintaan AJAX ke server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/toggle-perjalanan-dinas/' + userId, true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log('Status updated successfully');
                } else {
                    console.error('Gagal memperbarui status');
                    checkbox.checked = !isActive; // Kembalikan status ke nilai sebelumnya jika terjadi kesalahan
                }
            };

            var data = JSON.stringify({
                isActive: isActive
            });
            xhr.send(data);
        }
    </script>
@endsection
@include('layouts.partials.end')
