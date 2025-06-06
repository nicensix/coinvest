<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
public function run()
    {
        DB::table('wallets')->insert([
            [
                'user_id' => 1,
                'balance' => 5000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'balance' => 2500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
