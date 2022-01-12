<?php

namespace Database\Seeders;

use App\Models\Tracker;
use Illuminate\Database\Seeder;

class TrackerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tracker::factory(100)->create();
    }
}
