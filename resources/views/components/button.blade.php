@props(['variant' => 'primary'])
@php
    $base = 'rounded-pill border-2 px-6 py-3 text-sm font-bold transition duration-120 disabled:opacity-50 foco';
    $variantes = [
        'primary'   => 'border-transparent bg-accent text-on-accent hover:bg-accent-hover',
        'secondary' => 'border-line-strong text-ink hover:bg-surface-high',
        'ghost'     => 'border-transparent text-ink-muted hover:bg-surface-high hover:text-ink',
    ];
@endphp
<button {{ $attributes->merge(['type' => 'button', 'class' => $base.' '.$variantes[$variant]]) }}>{{ $slot }}</button>