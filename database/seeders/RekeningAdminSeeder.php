<?php

namespace Database\Seeders;

use App\Models\RekeningAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekeningAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['bank_id' => 1, 'account_number' => '1234567890', 'account_name' => 'John Doe'],
            ['bank_id' => 1, 'account_number' => '9876543210', 'account_name' => 'Jane Smith'],
            ['bank_id' => 2, 'account_number' => '1111111111', 'account_name' => 'Michael Brown'],
            ['bank_id' => 2, 'account_number' => '2222222222', 'account_name' => 'Emily Johnson'],
            ['bank_id' => 3, 'account_number' => '3333333333', 'account_name' => 'David Lee'],
            ['bank_id' => 3, 'account_number' => '4444444444', 'account_name' => 'Sarah Taylor'],
        ];

        // Mengisi data ke tabel accounts menggunakan model
        foreach ($accounts as $account) {
            RekeningAdmin::create($account);
        };
    }
}
