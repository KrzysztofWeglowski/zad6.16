<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('services')->insert([
            [
                'id' =>1,
                'name' => 'Wymiana ekranu',
                'description' => 'Wymień pęknięty lub uszkodzony ekran.',
                'price' => 150.00,
                'img' => 'wymiana.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>2,
                'name' => 'Wymiana baterii',
                'description' => 'Wymień starą lub wadliwą baterię.',
                'price' => 80.00,
                'img' => 'bateria.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>3,
                'name' => 'Naprawa mikrofonu',
                'description' => 'Napraw problemy z działaniem mikrofonu.',
                'price' => 90.00,
                'img' => 'wymiana_mikrofonu.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>4,
                'name' => 'Wymiana głośnika',
                'description' => 'Wymień uszkodzony głośnik.',
                'price' => 70.00,
                'img' => 'wymiana_głośnika.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>5,
                'name' => 'Naprawa przycisku zasilania',
                'description' => 'Napraw problemy z przyciskiem zasilania.',
                'price' => 60.00,
                'img' => 'Naprawa_przycisku_zasilania.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>6,
                'name' => 'Odzyskiwanie danych',
                'description' => 'Przywróć utracone dane.',
                'price' => 200.00,
                'img' => 'Odzyskiwanie_danych.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>7,
                'name' => 'Aktualizacja oprogramowania',
                'description' => 'Zaktualizuj oprogramowanie urządzenia.',
                'price' => 50.00,
                'img' => 'Aktualizacja_oprogramowania.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>8,
                'name' => 'Naprawa aparatu',
                'description' => 'Naprawa aparatu.',
                'price' => 40.00,
                'img' => 'Naprawa_aparatu.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>9,
                'name' => 'Kopia zapasowa danych',
                'description' => 'Konfiguracja i utrzymywanie regularnych kopii zapasowych danych.',
                'price' => 10.00,
                'img' => 'Kopia_zapasowa_danych.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' =>10,
                'name' => 'Aktualizacje i optymalizacja',
                'description' => 'Instalacja aktualizacji oprogramowania oraz optymalizacja wydajności systemu.',
                'price' => 30.00,
                'img' => 'Aktualizacje_i_optymalizacja.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
