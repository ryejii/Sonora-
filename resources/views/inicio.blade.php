@extends('layouts.panel', ['activa' => 'inicio'])

@section('titulo', 'Inicio · Sonora')

@section('contenido')
<div class="mb-6 flex flex-wrap gap-2" role="group" aria-label="Filtrar contenido">
    <x-chip :activo="true" data-filtro="todo">Todo</x-chip>
    <x-chip data-filtro="playlists">Playlists</x-chip>
    <x-chip data-filtro="canciones">Canciones</x-chip>
</div>

<h1 class="mb-4 text-3xl font-extrabold tracking-[-0.01em]">Buenas tardes</h1>

<section data-seccion="playlists" aria-labelledby="t-mezclas">
    <h2 id="t-mezclas" class="mb-4 text-xl font-bold">Tus mezclas</h2>
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
        @foreach ($playlists as $p)
            <x-media-card :href="route('playlist', $p['slug'])" :titulo="$p['titulo']" :artista="$p['autor']" :duracion="$p['tiempo']" :barras="$p['barras']" />
        @endforeach
    </div>
</section>

<section data-seccion="canciones" class="mt-8" aria-labelledby="t-recientes">
    <h2 id="t-recientes" class="mb-4 text-xl font-bold">Recién escuchado</h2>
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
        @foreach ([1, 2, 5, 9] as $i)
            <x-media-card :pista="$i" :titulo="$pistas[$i]['titulo']" :artista="$pistas[$i]['artista']" :duracion="$pistas[$i]['tiempo']" :barras="$pistas[$i]['barras']" />
        @endforeach
    </div>
</section>
@endsection