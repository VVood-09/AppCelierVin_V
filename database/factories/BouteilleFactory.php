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
            'pays'=> null,
            'description' => $this->faker->sentence(10),
            'prix_saq' => null,
            'url_saq' => null,
            'url_img' => null,
            'format' => $this->faker->numberBetween(250, 1000) . " ml",
            'provenance_id' => Provenance::all()->random()->id,
            'type_id' => Type::all()->random()->id,
        ];
    }
}
