<!-- total.blade.php -->
@php
    $total = \App\Models\Total::where('id', '1')->first();
@endphp
@yield('total', $total->total)
