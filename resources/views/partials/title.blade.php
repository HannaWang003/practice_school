@php
    $title = \App\Models\Title::where('sh', '1')->first();
@endphp
@yield('title', $title->img)
