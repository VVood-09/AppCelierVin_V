<?php

namespace Database\Factories;

use App\Models\Provenance;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class BouteilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->company . " " . $this->faker->catchPhrase,
            'image' => null,
            'code_saq' => null,
            'pays'=> $this->faker->country,
            'description' => $this->faker->sentence(10),
            'prix' => $this->faker->randomDigit(),
            'url_saq' => null,
            'format' => $this->faker->numberBetween(250, 1000) . " ml",
            'type' => null,
        ];
    }
}
