<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JuegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('juegos')->insert([
            'nombre' => 'Suika Game',
            'imagen' => 'suikagame.png',
            'reglas' => 'Se pueden jugar 2 intentos, de los cuales se usa sólo el Score mayor.',
            'descripcion' => 'Suika Game (en japonés, «juego de la sandía») es un videojuego de lógica, que combina elementos de los juegos de rompecabezas de caída y fusión. El concepto tiene su origen en un juego de navegador chino titulado Merge Big Watermelon, que se lanzó en enero de 2021. ',
            'color' => 'yellow',
            'selected' => 0
        ]);
        DB::table('juegos')->insert([
            'nombre' => 'Overcooked',
            'imagen' => 'overcooked.png',
            'reglas' => 'Se juega <strong>Overcooked 2</strong>, niveles 1-2 y 1-6. |Se suma el dinero ganado de ambos niveles. |Se tienen 2 intentos por nivel.',
            'descripcion' => 'Overcooked es un videojuego de cocina cooperativo en el que los jugadores toman el rol de chefs y deben cocinar los pedidos en el tiempo establecido mientras se mueven entre plataformas, portales, escaleras que se mueven y muchos obstáculos más.',
            'color' => 'blue',
            'selected' => 0
        ]);
        DB::table('juegos')->insert([
            'nombre' => 'Mario Kart 8',
            'imagen' => 'mariokart.png',
            'reglas' => 'Se juega <strong>Time Trial</strong> en cada pista elegida por los jugadores. |Se suman los tiempos. |Pistas a jugar:
            <ul>
                <li>Por definir</li>
                <li>Por definir</li>
                <li>Por definir</li>
                <li>Por definir</li>
                <li>Por definir</li>
            </ul>',
            'descripcion' => 'Mario Kart es una serie de videojuegos de carreras desarrollados y distribuidos por Nintendo como spin-offs de su marca registrada Super Mario y cuentan con la aparición de los personajes de la franquicia de Mario.',
            'color' => 'red',
            'selected' => 1
        ]);
        DB::table('juegos')->insert([
            'nombre' => 'NSS Bowling',
            'imagen' => 'bowling.png',
            'reglas' => 'Se juega modo <strong>standard</strong> y se pueden jugar 2 intentos, de los cuales se usa únicamente el Score mayor.',
            'descripcion' => 'Nintendo Switch Sports es un juego de simulación de deportes desarrollado por Nintendo. Todo sucede en una instalación ficticia llamada Spocco Square.',
            'color' => 'cyan',
            'selected' => 1
        ]);
        DB::table('juegos')->insert([
            'nombre' => 'NSS Golf',
            'imagen' => 'golf.png',
            'reglas' => 'Se juega <strong>9-hole Classic</strong>. |Un sólo intento.',
            'descripcion' => 'Nintendo Switch Sports es un juego de simulación de deportes desarrollado por Nintendo. Todo sucede en una instalación ficticia llamada Spocco Square.',
            'color' => 'cyan',
            'selected' => 1
        ]);
        DB::table('juegos')->insert([
            'nombre' => 'Dr. Mario',
            'imagen' => 'drmario.png',
            'reglas' => '<strong>Nivel 2</strong>, Velocidad <strong>MED</strong> y se juega hasta morir. |Se pueden jugar 2 intentos, de los cuales se usa únicamente el Score mayor.',
            'descripcion' => 'Dr. Mario es un videojuego de lógica donde el fontanero deja caer píldoras en el campo de juego. El jugador debe alinear las píldoras para conseguir derrotar a uno o más virus dependiendo de la alineación y de sus colores.',
            'color' => 'red',
            'selected' => 1
        ]);
        DB::table('juegos')->insert([
            'nombre' => 'Drink More Glurp',
            'imagen' => 'glurp.png',
            'reglas' => 'Se juega cada uno de los trials escogidos por los jugadores. |Cada uno con 2 intentos y se usa el mejor Score. |Los trials elegibles son: <ul>
                                <li>Original Taste - Throw</li>
                                <li>Limited time only - Fast Track</li>
                                <li>Mix \'n\' Match - Buyathlon</li>
                                <li>Comes as standard - Flight Training</li>
                                <li>Three for free - Run for it</li>
                                <li>Mix \'n\' Match - Trolley Dash</li>
                                <li>Comes as Standard - Skate Park</li>
                            </ul>',
            'descripcion' => 'Drink More Glurp es un juego tipo fiesta con física chiflada estilo deportes. Aliens han copiado nuestros juegos terrestres, pero están ligeramente incorrectos.',
            'color' => 'purple',
            'selected' => 0
        ]);
        DB::table('juegos')->insert([
            'nombre' => 'Mario Party Superstars',
            'imagen' => 'marioparty.png',
            'reglas' => 'Se juega cada uno de los mini-juegos escogidos por los jugadores. Cada uno con 2 intentos y se usa el mejor Score. |Los mini-juegos elegibles son: <ul>
                                <li>Crazy Cutters Stage 1</li>
                                <li>Tipsy Tourney</li>
                                <li>Mecha Marathon</li>
                                <li>Leaf Leap</li>
                                <li>Night Light Fright</li>
                                <li>Later Skater</li>
                                <li>What goes up</li>
                                <li>Snow Whirled</li>
                                <li>Monty\'s Revenge</li>
                                <li>Pokey Pummel</li>
                            </ul>',
            'descripcion' => 'Mario Party Superstars es un videojuego de socialización para Nintendo Switch. Es el duodécimo videojuego de la serie Mario Party, y el segundo para Nintendo Switch después de Super Mario Party (2018). ',
            'color' => 'yellow',
            'selected' => 0
        ]);
        DB::table('juegos')->insert([
            'nombre' => 'Gameboy Tetris',
            'imagen' => 'tetris.png',
            'reglas' => 'Se juega el modo <strong>B-Type, Level 0, High 0</strong>. |Se pueden jugar 2 intentos, de los cuales se usa el Score mayor.',
            'descripcion' => 'Tetris es un videojuego de puzle lanzado para el Game Boy en 1989. Es una versión portátil del Tetris original desarrollado por Alekséi Pázhitnov, y se incluyó en los lanzamientos norteamericanos y europeos del Game Boy.',
            'color' => 'green',
            'selected' => 0
        ]);
        DB::table('juegos')->insert([
            'nombre' => 'Pico Park',
            'imagen' => 'picopark.png',
            'reglas' => 'Se juega el modo <strong>Endless-plane</strong> con 2 jugadores y el participante maneja ambos controles al mismo tiempo. |Se permiten 5 intentos y se guarda el Score mayor.',
            'descripcion' => 'Pico Park es un juego cooperativo multijugador de acción y puzledesarrollado por TECOPARK. Solía llamarse Picollecitta, pero se cambió a Pico Park porque el nombre inicial era "difícil de recordar".',
            'color' => 'orange',
            'selected' => 1
        ]);

    }
}
