<?php

namespace Database\Factories;

use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random();
        return [
            'title' => $this->faker->name(),
            'email' => $user->email,
            'user_id' => $user->id,
            'state_id' => State::all()->random()->id,
        ];
    }
}
