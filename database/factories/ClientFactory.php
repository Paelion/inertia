<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'     => $this->faker->words(10, true),
            'company_name'    => $this->faker->company,
            'legal_status'    => $this->faker->words(3, true),
            'capital'         => $this->faker->numberBetween($min = 1000, $max = 100000),
            'siret'           => $this->faker->numberBetween($min = 1000, $max = 3000),
            'code_naf'        => $this->faker->numberBetween($min = 100, $max = 900),
            'country'         => $this->faker->country,
            'address'         => $this->faker->address,
            'zip_code'        => $this->faker->postcode,
            'city'            => $this->faker->city,
            'projects'        => $this->faker->numberBetween($min = 1, $max = 10)
        ];
    }
}
