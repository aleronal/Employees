<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $country_id = DB::table('countries')->pluck('id');

        return [
            'name' => $this->faker->state(),
            'country_id' => $this->faker->randomElement($country_id),
        ];
    }
}
