<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtletaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('atletas')->insert([
            'nombre' => 'Jiggly',
            'imagen' => 'jiggly.jpg',
            'color' => 'purple',
            'juego_id' => 6
        ]);
        DB::table('atletas')->insert([
            'nombre' => 'Dorita',
            'imagen' => 'dorita.jpg',
            'color' => 'blue',
            'juego_id' => 4
        ]);
        DB::table('atletas')->insert([
            'nombre' => 'Jenny',
            'imagen' => 'jenny.jpg',
            'color' => 'magenta',
            'juego_id' => 10
        ]);
        DB::table('atletas')->insert([
            'nombre' => 'Armando',
            'imagen' => 'armando.jpg',
            'color' => 'grey',
            'juego_id' => 3
        ]);
        DB::table('atletas')->insert([
            'nombre' => 'Scorer',
            'imagen' => 'scorer.jpg',
            'color' => 'green',
            'juego_id' => 5
        ]);

    }
}
