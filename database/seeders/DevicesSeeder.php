<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       
        DB::table('devices')->insert([
            [
                'id' => 1,
                'client_id' => 1,
                'brand' => 'Apple',
                'model' => 'iPhone 13',
                'serial_number' => 'SN1234567890',
                'warranty_expiry_date' => '2025-12-31',
                'warranty_provider' => 'AppleCare',
                'warranty_claim_number' => 'WCN123456',
            ],
            [
                'id' => 2,
                'client_id' => 2,
                'brand' => 'Samsung',
                'model' => 'Galaxy S22',
                'serial_number' => 'SN9876543210',
                'warranty_expiry_date' => '2026-06-30',
                'warranty_provider' => 'Samsung Care',
                'warranty_claim_number' => 'WCN987654',
            ],
            [
                'id' => 3,
                'client_id' => 3,
                'brand' => 'Google',
                'model' => 'Pixel 6',
                'serial_number' => 'SN1111111111',
                'warranty_expiry_date' => '2025-09-30',
                'warranty_provider' => 'Google Warranty',
                'warranty_claim_number' => 'WCN111111',
            ],
            [
                'id' => 4,
                'client_id' => 4,
                'brand' => 'OnePlus',
                'model' => 'OnePlus 9',
                'serial_number' => 'SN2222222222',
                'warranty_expiry_date' => '2026-03-31',
                'warranty_provider' => 'OnePlus Warranty',
                'warranty_claim_number' => 'WCN222222',
            ],
            [
                'id' => 5,
                'client_id' => 5,
                'brand' => 'Huawei',
                'model' => 'P30 Pro',
                'serial_number' => 'SN3333333333',
                'warranty_expiry_date' => '2025-06-30',
                'warranty_provider' => 'Huawei Warranty',
                'warranty_claim_number' => 'WCN333333',
            ],
            [
                'id' => 6,
                'client_id' => 6,
                'brand' => 'Apple',
                'model' => 'iPhone 12',
                'serial_number' => 'SN4444444444',
                'warranty_expiry_date' => '2026-09-30',
                'warranty_provider' => 'AppleCare',
                'warranty_claim_number' => 'WCN444444',
            ],
            [
                'id' => 7,
                'client_id' => 7,
                'brand' => 'Samsung',
                'model' => 'Galaxy S21',
                'serial_number' => 'SN5555555555',
                'warranty_expiry_date' => '2025-03-31',
                'warranty_provider' => 'Samsung Care',
                'warranty_claim_number' => 'WCN555555',
            ],
            [
                'id' => 8,
                'client_id' => 8,
                'brand' => 'Google',
                'model' => 'Pixel 5',
                'serial_number' => 'SN6666666666',
                'warranty_expiry_date' => '2026-12-31',
                'warranty_provider' => 'Google Warranty',
                'warranty_claim_number' => 'WCN666666',
            ],
            [
                'id' => 9,
                'client_id' => 9,
                'brand' => 'OnePlus',
                'model' => 'OnePlus 8',
                'serial_number' => 'SN7777777777',
                'warranty_expiry_date' => '2025-09-30',
                'warranty_provider' => 'OnePlus Warranty',
                'warranty_claim_number' => 'WCN777777',
            ],
            [
                'id' => 10,
                'client_id' => 10,
                'brand' => 'Huawei',
                'model' => 'P40 Pro',
                'serial_number' => 'SN8888888888',
                'warranty_expiry_date' => '2026-06-30',
                'warranty_provider' => 'Huawei Warranty',
                'warranty_claim_number' => 'WCN888888',
            ],
        ]);

    }
}