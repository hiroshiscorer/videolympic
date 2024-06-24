<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Scorer',
            'email' => 'hiroshi_scorer@yahoo.com',
            'password' => '$2y$12$xKUmW9OY0xxwVbCGHafBjeX6yzF7B49Wsf/RjsJ8PQ0RXYphVV9ku'
        ]);

    }
}
