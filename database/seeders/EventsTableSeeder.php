<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'title' => 'Cena Romántica',
                'description' => 'Cena temática italiana en casa.',
                'date' => Carbon::create('2024', '06', '01'),
                'time' => '19:00:00',
                'is_personal' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Noche de Película',
                'description' => 'Ver una película de comedia romántica.',
                'date' => Carbon::create('2024', '06', '02'),
                'time' => '21:00:00',
                'is_personal' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Añade más eventos según sea necesario
        ]);
    }
}
