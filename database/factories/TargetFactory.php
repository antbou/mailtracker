<?php

namespace Database\Factories;

use App\Models\Tracker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TargetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ip' => $this->faker->localIpv4,
            'user_agent' => $this->faker->userAgent,
            'tracker_id' => Tracker::all()->random()->id,
        ];
    }
}
