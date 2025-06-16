<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optionally create test data from factories
        // \App\Models\User::factory(10)->create();

        // Call individual seeders
        $this->call([
            UserSeeder::class,
            WalletSeeder::class,
            TransactionSeeder::class,
            InvestmentSeeder::class,
            // Add any other seeders here
        ]);
    }
}