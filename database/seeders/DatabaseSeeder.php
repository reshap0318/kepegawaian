<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
        $this->call(fungsionalSeeder::class);
        $this->call(jabatanUnitSeeder::class);
        $this->call(pangkatGolonganSeeder::class);
    }
}
