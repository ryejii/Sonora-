@props(['pista'])
<div role="region" aria-label="Reproductor" class="grid shrink-0 items-center gap-2 border-t border-line bg-surface-raised px-4 py-3 md:h-20 md:grid-cols-[1fr_2fr_1fr] md:py-0">
    <div class="flex min-w-0 items-center gap-3">
        <a href="{{ route('reproductor') }}" class="flex min-w-0 items-center gap-3 rounded-md foco">
            <x-cover :barras="$pista['barras']" data-portada class="size-12 shrink-0 gap-0.5 rounded-sm p-2" />
            <span class="min-w-0">
                <span data-campo="titulo" class="block truncate text-sm font-bold">{{ $pista['titulo'] }}</span>
                <span data-campo="artista" class="block truncate text-sm font-medium text-ink-muted">{{ $pista['artista'] }}</span>
            </span>
        </a>
    </div>
    <div class="flex flex-col items-center gap-1">
        <x-controles />
        <x-progreso :total="$pista['tiempo']" />
    </div>
    <div></div>
</div>