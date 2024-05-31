<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::table('services')->truncate();
        DB::table('clients')->truncate();
        DB::table('devices')->truncate();
        DB::table('repairs')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call([
            RoleSeeder::class,
            ServiceSeeder::class,
            ClientsSeeder::class,
            DevicesSeeder::class,            
            RepairsSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
