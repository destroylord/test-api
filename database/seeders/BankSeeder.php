<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = [
            ['name' => 'Bank Rakyat Indonesia', 'code' => 'BRI'],
            ['name' => 'Bank Central Asia', 'code' => 'BCA'],
            ['name' => 'Bank Negara Indonesia', 'code' => 'BNI'],
            ['name' => 'Bank Mandiri', 'code' => 'BM'],
        ];

        foreach ($banks as $bank) {
            Bank::create($bank);
        }
    }
}
