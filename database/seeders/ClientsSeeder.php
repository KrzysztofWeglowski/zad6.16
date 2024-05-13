<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; 

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('clients')->insert([
            [
            'id' =>1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123456789',
            'address' => '123 Main Street'
            ],
            [
            'id' =>2,
            'name' => 'Anna Kowalska', 
            'email' => 'anna@example.com', 
            'phone' => '987654321', 
            'address' => '456 Elm Street'
            ],
            [
            'id' =>3,
            'name' => 'Jan Nowak', 
            'email' => 'jan@example.com',
            'phone' => '111222333', 
            'address' => '789 Oak Avenue'
            ],
            [
                'id' =>4,
            'name' => 'Maria Nowakowska', 
            'email' => 'maria@example.com', 
            'phone' => '444555666',
            'address' => '321 Maple Drive'
            ],
            [
                'id' =>5,
            'name' => 'Adam Smith', 
            'email' => 'adam@example.com', 
            'phone' => '555555555', 
            'address' => '555 Pine Road'
            ],
            [
                'id' =>6,
            'name' => 'Joanna Wiśniewska', 
            'email' => 'Joanna@example.com',
            'phone' => '777888999', 
            'address' => '999 Cedar Lane'
            ],
            [
                'id' =>7,
            'name' => 'Tomasz Kowalczyk', 
            'email' => 'tomasz@example.com', 
            'phone' => '444444444', 
            'address' => '444 Birch Street'
            ],
            [
                'id' =>8,
            'name' => 'Marta Lewandowska', 
            'email' => 'marta@example.com', 
            'phone' => '666666666', 
            'address' => '666 Spruce Avenue'
            ],
            [
                'id' =>9,
            'name' => 'Paweł Nowicki', 
            'email' => 'pawel@example.com', 
            'phone' => '888888888',
            'address' => '777 Fir Boulevard'
            ],
            [
                'id' =>10,
            'name' => 'Agnieszka Kaczmarek',
            'email' => 'agnieszka@example.com',
            'phone' => '222333444', 
            'address' => '888 Walnut Way'
            ],
        ]);
    }
}
