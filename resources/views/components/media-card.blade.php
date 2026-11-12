@props(['titulo', 'artista', 'duracion', 'barras', 'href' => null, 'pista' => null])
@php $tag = $href ? 'a' : 'button'; @endphp
<{{ $tag }} @if ($href) href="{{ $href }}" @else type="button" data-pista="{{ $pista }}" @endif
    class="group block w-full rounded-md bg-surface-raised p-4 text-left transition duration-120 hover:bg-surface-high hover:shadow-raise foco">
    <x-cover :barras="$barras" class="mb-4 aspect-square w-full gap-1 rounded-md p-4 group-hover:bg-surface-base" />
    <span class="block text-xl font-bold">{{ $titulo }}</span>
    <span class="mt-1 block text-sm font-medium text-ink-muted">{{ $artista }}</span>
    <span class="mt-2 block font-mono text-xs text-ink-muted">{{ $duracion }}</span>
</{{ $tag }}>