<?php

namespace Database\Seeders;

use ClientesSeeder;
use Database\Seeders\ClientesSeeder as SeedersClientesSeeder;
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
        // \App\Models\User::factory(10)->create();
        // $this->call(ClientesSeeder::class);
        $this->call(SeedersClientesSeeder::class);
    }
}
