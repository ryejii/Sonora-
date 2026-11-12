@extends('layouts.app')

@section('titulo', 'Reproduciendo · Sonora')

@section('cuerpo')
<div class="grid min-h-dvh grid-cols-1 md:h-dvh md:grid-cols-[1fr_320px]">
    <main id="principal" class="relative flex flex-col items-center justify-center gap-4 px-8 pb-8 pt-20">
        <a href="{{ route('inicio') }}" class="absolute left-4 top-4 flex items-center gap-2 rounded-pill px-4 py-2 text-sm font-bold text-ink-muted hover:bg-surface-high hover:text-ink foco">
            <x-icon name="home" /> Inicio
        </a>
                <x-button variant="ghost" data-tema class="absolute right-4 top-4">Cambiar tema</x-button>
        <x-cover :barras="$pistas[0]['barras']" data-portada class="aspect-square w-full max-w-80 gap-2 rounded-lg p-8" />
        <div class="text-center">
            <h1 data-campo="titulo" class="text-3xl font-extrabold tracking-[-0.01em]">{{ $pistas[0]['titulo'] }}</h1>
            <p data-campo="meta" class="mt-1 text-sm font-medium text-ink-muted">{{ $pistas[0]['artista'] }} · {{ $pistas[0]['album'] }}</p>
        </div>
        <x-progreso :total="$pistas[0]['tiempo']" class="max-w-md" />
        <x-controles :grande="true" />
    </main>

    <aside aria-labelledby="t-cola" class="bg-surface-raised px-4 py-6 md:overflow-y-auto">
        <h2 id="t-cola" class="mb-4 text-xl font-bold">En cola</h2>
        <ol>
            @foreach ($pistas as $i => $pista)
                <li><x-song-row :numero="$i + 1" :idx="$i" :pista="$pista" :actual="$i === 0" /></li>
            @endforeach
        </ol>
    </aside>
</div>
@endsection