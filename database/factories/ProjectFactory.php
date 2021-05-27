<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        $client = DB::table('clients')->select('company_name')->inRandomOrder()->limit(1)->value('company_name');

        return [
            'client'       => $client,
            'lastname'     => $this->faker->lastName,
            'firstname'    => $this->faker->firstName,
            'phone'        => $this->faker->phoneNumber,
            'email'        => $this->faker->email,
            'title'        => $this->faker->words(4, true),
            'description'  => $this->faker->sentences(2, true),
            'start_date'   => $this->faker->dateTime,
            'end_date'     => $this->faker->dateTime,
            'status'       => $this->faker->numberBetween($min = 1, $max = 3),
            'paied_days'   => $this->faker->numberBetween($min = 1, $max = 50)


        ];
    }
}
