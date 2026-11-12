@props(['total' => '00:00'])
<div {{ $attributes->merge(['class' => 'flex w-full items-center gap-2 font-mono text-xs text-ink-muted']) }}>
    <span data-campo="tiempo">00:00</span>
    <div data-barra role="slider" tabindex="0" aria-label="Progreso de la canción" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"
         class="flex h-6 flex-1 cursor-pointer items-center rounded-pill foco">
        <div class="h-1 w-full rounded-pill bg-surface-high"><div data-relleno class="h-1 rounded-pill bg-accent" style="width: 0%"></div></div>
    </div>
    <span data-campo="duracion">{{ $total }}</span>
</div>