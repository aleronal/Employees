<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $state_id = DB::table('states')->pluck('id');

        return [
            'state_id' => $this->faker->randomElement($state_id),
            'name' => $this->faker->city(),
        ];
    }
}
