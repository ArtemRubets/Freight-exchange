<?php

namespace Database\Seeders;

use App\Models\Load;
use App\Models\Point;
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
        Load::factory(20)->has(Point::factory())->create();
    }
}
