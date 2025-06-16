<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Wallet;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@example.com')->first();
        $user = User::where('email', 'user@example.com')->first();

        $adminWallet = Wallet::where('user_id', $admin?->id)->first();
        $userWallet = Wallet::where('user_id', $user?->id)->first();

        if ($admin && $user && $adminWallet && $userWallet) {
            DB::table('transactions')->insert([
                [
                    'user_id' => $admin->id,
                    'wallet_id' => $adminWallet->id,
                    'type' => 'deposit',
                    'amount' => 1000.00,
                    'status' => 'completed',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $user->id,
                    'wallet_id' => $userWallet->id,
                    'type' => 'withdrawal',
                    'amount' => 500.00,
                    'status' => 'completed',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $admin->id,
                    'wallet_id' => $adminWallet->id,
                    'type' => 'transfer',
                    'amount' => 300.00,
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}