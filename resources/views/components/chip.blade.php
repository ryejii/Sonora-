@props(['activo' => false])
<button type="button" aria-pressed="{{ $activo ? 'true' : 'false' }}"
    {{ $attributes->merge(['class' => 'rounded-pill border-2 border-transparent bg-surface-high px-4 py-2 text-xs font-bold uppercase tracking-wider text-ink transition duration-120 hover:border-line-strong aria-pressed:bg-accent aria-pressed:text-on-accent foco']) }}>{{ $slot }}</button>