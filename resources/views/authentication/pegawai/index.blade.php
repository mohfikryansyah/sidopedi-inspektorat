@extends('layouts.main')
@section('content')
    @include('layouts.partials.alert-success')
    <div class="md:grid md:space-y-0 space-y-4 grid-cols-7 gap-5">
        {{-- @if (auth()->user()->hasRole('PEGAWAI'))
            @include('authentication.pegawai.LaporanResource.create')
        @endif --}}
    @include('authentication.pegawai.LaporanResource.table-laporan')
</div>
@endsection
@include('layouts.partials.end')
