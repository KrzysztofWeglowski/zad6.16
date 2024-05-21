<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RepairsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        DB::table('repairs')->insert([
            [
                'id' =>1,
                'device_id' => 1,
                'description' => 'Wymiana ekranu',
                'repair_date' => '2023-01-01',
                'repair_cost' => 150.00,
            ],
            [
                'id' =>2,
                'device_id' => 2,
                'description' => 'Wymiana baterii',
                'repair_date' => '2023-02-15',
                'repair_cost' => 80.00,
            ],
            [
                'id' =>3,
                'device_id' => 3,
                'description' => 'Naprawa mikrofonu',
                'repair_date' => '2023-03-05',
                'repair_cost' => 90.00,
            ],
            [
                'id' =>4,
                'device_id' => 4,
                'description' => 'Wymiana głośnika',
                'repair_date' => '2023-04-10',
                'repair_cost' => 70.00,
            ],
            [
                'id' =>5,
                'device_id' => 5,
                'description' => 'Naprawa przycisku zasilania',
                'repair_date' => '2023-05-01',
                'repair_cost' => 60.00,
            ],
            [
                'id' =>6,
                'device_id' => 6,
                'description' => 'Odzyskiwanie danych',
                'repair_date' => '2023-06-15',
                'repair_cost' => 200.00,
            ],
            [
                'id' =>7,
                'device_id' => 7,
                'description' => 'Aktualizacja oprogramowania',
                'repair_date' => '2023-07-01',
                'repair_cost' => 50.00,
            ],
            [
                'id' =>8,
                'device_id' => 8,
                'description' => 'Naprawa mikrofonu',
                'repair_date' => '2023-08-10',
                'repair_cost' => 40.00,
            ],
            [
                'id' =>9,
                'device_id' => 9,
                'description' => 'Kopia zapasowa danych',
                'repair_date' => '2023-09-01',
                'repair_cost' => 10.00,
            ],
            [
                'id' =>10,
                'device_id' => 10,
                'description' => 'Aktualizacje i optymalizacja',
                'repair_date' => '2023-10-15',
                'repair_cost' => 30.00,
            ],
        ]);


    }
}
