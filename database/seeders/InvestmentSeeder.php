<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class InvestmentSeeder extends Seeder
{
   public function run()
    {
        DB::table('investments')->insert([
            [
                'user_id' => 1,
                'wallet_id' => 3, // Match actual wallet ID
                'investment_type' => 'stocks',
                'amount' => 2000.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'wallet_id' => 4, // Match actual wallet ID
                'investment_type' => 'crypto',
                'amount' => 1500.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
