@props(['grande' => false])
@php $b = 'flex size-10 items-center justify-center rounded-pill text-ink hover:bg-surface-high foco'; @endphp
<div {{ $attributes->merge(['class' => 'flex items-center '.($grande ? 'gap-8' : 'gap-4')]) }}>
    <button type="button" data-accion="anterior" aria-label="Anterior" class="{{ $b }}"><x-icon name="prev" /></button>
    <button type="button" data-accion="alternar" aria-label="Reproducir"
        class="flex {{ $grande ? 'size-14' : 'size-10' }} items-center justify-center rounded-pill bg-accent text-on-accent transition duration-120 hover:bg-accent-hover foco">
        <x-icon name="play" data-icono="play" />
        <x-icon name="pause" data-icono="pausa" class="hidden" />
    </button>
    <button type="button" data-accion="siguiente" aria-label="Siguiente" class="{{ $b }}"><x-icon name="next" /></button>
    @if ($grande)
        <button type="button" data-accion="megusta" aria-pressed="false" aria-label="Guardar en tu biblioteca" class="group {{ $b }} aria-pressed:text-accent">
            <x-icon name="heart" class="group-aria-pressed:fill-current" />
        </button>
    @endif
</div>