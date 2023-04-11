<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $client = User::client()->pluck('id')->toArray();
        return [
            'client_id' => Arr::random($client),
            'category_id' => rand(1, 4),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'budget' =>  $this->faker->randomFloat(2, 0, 1000),
            'duration_id' => rand(1, 3),
            'status' => 'open',
        ];
    }
}
