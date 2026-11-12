@extends('layouts.app')

@section('cuerpo')
@php
    $enlaces = [
        ['inicio', 'Inicio', 'home', route('inicio')],
        ['playlist', 'Tus mezclas', 'library', route('playlist', 'mezcla-diaria-1')],
        ['reproductor', 'Reproduciendo', 'play', route('reproductor')],
    ];
@endphp
<div class="flex h-dvh flex-col">
    <div class="flex min-h-0 flex-1 flex-col md:flex-row">
        <nav aria-label="Principal" class="flex shrink-0 flex-wrap items-center gap-2 bg-surface-raised p-4 md:w-50 md:flex-col md:items-stretch md:px-4 md:py-6">
            <a href="{{ route('inicio') }}" class="flex items-center gap-2 rounded-md text-accent md:mb-6 foco">
                <svg class="size-7" viewBox="0 0 64 64" fill="currentColor" aria-hidden="true"><rect x="4" y="32" width="8" height="28" rx="4"/><rect x="16" y="12" width="8" height="48" rx="4"/><rect x="28" y="24" width="8" height="36" rx="4"/><rect x="40" y="4" width="8" height="56" rx="4"/><rect x="52" y="36" width="8" height="24" rx="4"/></svg>
                <span class="text-xl font-extrabold tracking-[-0.01em] text-ink">Sonora</span>
            </a>
            @foreach ($enlaces as [$clave, $texto, $icono, $url])
                <a href="{{ $url }}" @if (($activa ?? '') === $clave) aria-current="page" @endif
                   class="flex items-center gap-3 rounded-md p-3 text-sm font-bold text-ink-muted hover:bg-surface-high hover:text-ink aria-[current=page]:bg-surface-high aria-[current=page]:text-ink foco">
                    <x-icon :name="$icono" /> {{ $texto }}
                </a>
            @endforeach
            <x-button variant="ghost" data-tema class="md:mt-auto">Cambiar tema</x-button>
        </nav>
        <main id="principal" class="min-w-0 flex-1 overflow-y-auto px-4 py-6 md:px-8">
            @yield('contenido')
        </main>
    </div>
    <x-barra-reproductor :pista="$pistas[0]" />
</div>
@endsection