<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'user_id' => 1,
                'wallet_id' => 3,
                'type' => 'deposit',
                'amount' => 1000.00,
                'status' => 'completed',
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'wallet_id' => 4,
                'type' => 'withdrawal',
                'amount' => 500.00,
                'status' => 'completed',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'wallet_id' => 3,
                'type' => 'transfer',
                'amount' => 300.00,
                'status' => 'pending',
                'created_at' => now(),
            ],
        ]);
    }
}

