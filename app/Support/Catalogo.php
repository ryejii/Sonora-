<?php

namespace App\Support;

// Datos de ejemplo inventados. Más adelante pueden venir de un modelo Track.
class Catalogo
{
    public static function t(int $s): string
    {
        return $s >= 3600
            ? sprintf('%d:%02d:%02d', intdiv($s, 3600), intdiv($s % 3600, 60), $s % 60)
            : sprintf('%02d:%02d', intdiv($s, 60), $s % 60);
    }

    public static function pistas(): array
    {
        $d = [
            ['Noches de lluvia', 'Mar Abierto', 'Sin prisa', 258, [45, 80, 60, 95, 50, 70]],
            ['Hora azul', 'Luz de Norte', 'Cielo bajo', 232, [65, 35, 80, 55, 45, 75]],
            ['Cuerdas', 'Estudio Cinco', 'Taller', 307, [45, 75, 35, 85, 60, 50]],
            ['Caminos', 'Mar Abierto', 'Sin prisa', 209, [30, 60, 90, 50, 80, 40]],
            ['Sin prisa', 'Luz de Norte', 'Cielo bajo', 284, [50, 85, 40, 70, 60, 90]],
            ['Marea baja', 'Mar Abierto', 'Sin prisa', 221, [70, 40, 85, 55, 35, 65]],
            ['Ventana abierta', 'Casa Verde', 'Patio', 246, [35, 65, 50, 90, 70, 45]],
            ['Papel y tinta', 'Estudio Cinco', 'Taller', 198, [80, 50, 65, 40, 85, 55]],
            ['Última parada', 'Luz de Norte', 'Cielo bajo', 273, [55, 90, 45, 75, 35, 80]],
            ['Brasas', 'Casa Verde', 'Patio', 215, [40, 70, 95, 50, 65, 30]],
        ];
        return array_map(fn ($x) => [
            'titulo' => $x[0], 'artista' => $x[1], 'album' => $x[2],
            'dur' => $x[3], 'tiempo' => self::t($x[3]), 'barras' => $x[4],
        ], $d);
    }

    public static function playlists(): array
    {
        $p = self::pistas();
        $d = [
            ['mezcla-diaria-1', 'Mezcla diaria 1', 'Para ti', 'Canciones que te acompañan en el camino.', [0, 3, 6, 1, 8, 4], [40, 70, 55, 90, 35]],
            ['noches-de-lluvia', 'Noches de lluvia', 'Playlist', 'Para escuchar con la ventana abierta.', [0, 5, 2, 7, 9], [80, 45, 65, 30, 75]],
            ['sin-prisa', 'Sin prisa', 'Mar Abierto', 'Un recorrido lento por sus mejores temas.', [4, 3, 5, 0], [50, 85, 40, 70, 60]],
            ['caminos', 'Caminos', 'Playlist', 'Para ir de un lugar a otro sin mirar el reloj.', [3, 6, 8, 9, 1, 7], [30, 60, 90, 50, 80]],
        ];
        return array_map(fn ($x) => [
            'slug' => $x[0], 'titulo' => $x[1], 'autor' => $x[2], 'desc' => $x[3],
            'pistas' => $x[4], 'barras' => $x[5],
            'tiempo' => self::t(array_sum(array_map(fn ($i) => $p[$i]['dur'], $x[4]))),
        ], $d);
    }
}