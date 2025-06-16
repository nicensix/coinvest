<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wallet;

class WalletSeeder extends Seeder
{
    public function run(): void
    {
        // Get users based on known emails from UserSeeder
        $admin = User::where('email', 'admin@example.com')->first();
        $user = User::where('email', 'user@example.com')->first();

        // Create wallets and associate them directly via relationships or foreign keys
        if ($admin) {
            Wallet::create([
                'user_id' => $admin->id,
                'balance' => 5000.00,
            ]);
        }

        if ($user) {
            Wallet::create([
                'user_id' => $user->id,
                'balance' => 2500.00,
            ]);
        }
    }
}