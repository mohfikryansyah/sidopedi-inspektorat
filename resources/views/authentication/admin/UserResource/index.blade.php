@extends('layouts.main')
@section('content')
    @include('layouts.partials.alert-success')
    <div class="md:grid md:space-y-0 space-y-4 grid-cols-7 gap-5">
        @include('authentication.admin.UserResource.table-user')
    </div>
@endsection
@include('layouts.partials.end')
