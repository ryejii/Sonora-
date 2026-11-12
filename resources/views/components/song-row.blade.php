@props(['numero', 'idx', 'pista', 'actual' => false])
<button type="button" data-pista="{{ $idx }}" data-marcar @if ($actual) aria-current="true" @endif
    class="group grid w-full grid-cols-[24px_1fr_auto] items-center gap-3 rounded-md px-2 py-3 text-left hover:bg-surface-high aria-[current=true]:bg-surface-high foco">
    <span class="font-mono text-xs text-ink-muted group-aria-[current=true]:text-accent">{{ str_pad($numero, 2, '0', STR_PAD_LEFT) }}</span>
    <span class="min-w-0">
        <span class="block truncate text-sm font-bold">{{ $pista['titulo'] }}</span>
        <span class="block truncate text-sm font-medium text-ink-muted">{{ $pista['artista'] }}</span>
    </span>
    <span class="font-mono text-xs text-ink-muted">{{ $pista['tiempo'] }}</span>
</button>