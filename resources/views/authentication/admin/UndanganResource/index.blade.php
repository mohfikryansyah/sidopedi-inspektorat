@extends('layouts.main')
@section('content')
    @include('layouts.partials.alert-success')
    @include('layouts.partials.search-input')
    <div class="md:grid md:space-y-0 space-y-4 grid-cols-7 gap-5">
        @role('ADMIN')
        @include('authentication.admin.UndanganResource.create')
        @endrole
        @include('authentication.admin.UndanganResource.table-undangan')
    </div>
@endsection
@include('layouts.partials.end')
