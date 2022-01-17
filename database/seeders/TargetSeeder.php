<?php

namespace Database\Seeders;

use App\Models\Target;
use App\Models\Tracker;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Tracker::all() as $tracker) {
            for ($i = 0; $i < rand(0, 5); $i++) {
                Target::factory()->withTrackerId($tracker->id)->create();
            }
        }
    }
}
