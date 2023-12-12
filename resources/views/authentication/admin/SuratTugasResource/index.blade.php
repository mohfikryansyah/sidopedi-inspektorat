@extends('layouts.main')
@section('content')
    @include('layouts.partials.alert-success')
    <div class="md:grid md:space-y-0 space-y-4 grid-cols-7 gap-5">
        @role('ADMIN')
        @include('authentication.admin.SuratTugasResource.create')
        @endrole
        @include('authentication.admin.SuratTugasResource.table-surat-tugas')
    </div>
@endsection
@include('layouts.partials.end')
