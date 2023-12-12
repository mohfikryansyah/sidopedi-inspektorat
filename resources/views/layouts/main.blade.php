@include('layouts.app')
@include('layouts.partials.nav')
@include('layouts.partials.header')
<div class="max-w-screen-xl mx-auto p-4">
    @yield('content')
</div>
@include('layouts.partials.footer')
@include('layouts.partials.end')