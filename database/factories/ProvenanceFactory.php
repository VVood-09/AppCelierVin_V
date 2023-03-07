<?php

namespace Database\Factories;

use App\Models\Provenance;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProvenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Provenance::class;

    public function definition()
    {
        return [
            'pays' => $this->faker->country,
        ];
    }
}
