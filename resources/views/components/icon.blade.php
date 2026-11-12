@props(['name'])
@php
    $rellenos = [
        'play'  => '<path d="M8 5v14l11-7z"/>',
        'pause' => '<rect x="6" y="5" width="4" height="14" rx="1"/><rect x="14" y="5" width="4" height="14" rx="1"/>',
        'next'  => '<path d="M6 5l9 7-9 7z"/><rect x="17" y="5" width="2" height="14" rx="1"/>',
        'prev'  => '<path d="M18 5l-9 7 9 7z"/><rect x="5" y="5" width="2" height="14" rx="1"/>',
    ];
    $trazos = [
        'heart'   => '<path d="M12 20s-7-4.4-7-10a4 4 0 0 1 7-2.5A4 4 0 0 1 19 10c0 5.6-7 10-7 10z"/>',
        'home'    => '<path d="M4 11l8-7 8 7v9h-5v-6H9v6H4z"/>',
        'library' => '<path d="M5 5v14M10 5v14M15 6l4 13"/>',
    ];
    $esTrazo = isset($trazos[$name]);
@endphp
<svg {{ $attributes->merge(['class' => 'size-6 shrink-0']) }} viewBox="0 0 24 24" aria-hidden="true"
    @if ($esTrazo) fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" @else fill="currentColor" @endif>{!! $trazos[$name] ?? $rellenos[$name] !!}</svg>