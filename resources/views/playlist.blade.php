@extends('layouts.panel', ['activa' => 'playlist'])

@section('titulo', $playlist['titulo'].' · Sonora')

@section('contenido')
<header class="mb-8 flex flex-col gap-6 md:flex-row md:items-end">
    <x-cover :barras="$playlist['barras']" class="aspect-square w-full max-w-56 shrink-0 gap-2 rounded-md p-6" />
    <div>
        <p class="text-xs font-bold uppercase tracking-wider text-ink-muted">Playlist</p>
        <h1 class="mt-1 text-3xl font-extrabold tracking-[-0.01em]">{{ $playlist['titulo'] }}</h1>
        <p class="mt-2 text-base text-ink-muted">{{ $playlist['desc'] }}</p>
        <p class="mt-2 text-sm font-medium text-ink-muted">
            {{ $playlist['autor'] }} · <span class="font-mono">{{ count($playlist['pistas']) }} canciones</span> · <span class="font-mono">{{ $playlist['tiempo'] }}</span>
        </p>
        {{-- El único botón primario ámbar de la vista es el de la barra del reproductor --}}
        <x-button variant="secondary" class="mt-4" :data-pista="$playlist['pistas'][0]">Reproducir</x-button>
    </div>
</header>

<h2 class="sr-only">Canciones</h2>
<ol class="rounded-lg bg-surface-raised p-2">
    @foreach ($playlist['pistas'] as $n => $idx)
        <li><x-song-row :numero="$n + 1" :idx="$idx" :pista="$pistas[$idx]" /></li>
    @endforeach
</ol>
@endsection