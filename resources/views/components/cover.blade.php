@props(['barras' => [50, 80, 60, 90, 40]])
{{-- Marcador de portada: surface-high con barras ecualizadoras (nunca un degradado). --}}
<span {{ $attributes->merge(['class' => 'flex items-end bg-surface-high']) }}>
    @foreach ($barras as $h)
        <i class="flex-1 rounded-pill bg-accent" style="height: {{ $h }}%"></i>
    @endforeach
</span>