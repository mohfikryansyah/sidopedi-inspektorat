@extends('layouts.main')
@section('content')
    @include('layouts.partials.alert-success')
    @include('layouts.partials.search-input')
    <div class="md:grid md:space-y-0 space-y-4 grid-cols-7 gap-5">
        @role('PEGAWAI')
        @include('authentication.pegawai.LaporanResource.create')
        @endrole
        @include('authentication.pegawai.LaporanResource.table-laporan')
    </div>
@endsection
@include('layouts.partials.end')
