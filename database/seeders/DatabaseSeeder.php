<?php

namespace Database\Seeders;

use App\Models\Socks;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Socks::factory(10)->create();
    }
}
