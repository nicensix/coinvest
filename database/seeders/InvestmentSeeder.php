<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;

class InvestmentSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@example.com')->first();
        $user = User::where('email', 'user@example.com')->first();

        $adminWallet = Wallet::where('user_id', $admin?->id)->first();
        $userWallet = Wallet::where('user_id', $user?->id)->first();

        if ($admin && $user && $adminWallet && $userWallet) {
            DB::table('investments')->insert([
                [
                    'user_id' => $admin->id,
                    'wallet_id' => $adminWallet->id,
                    'investment_type' => 'stocks',
                    'amount' => 2000.00,
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $user->id,
                    'wallet_id' => $userWallet->id,
                    'investment_type' => 'crypto',
                    'amount' => 1500.00,
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}