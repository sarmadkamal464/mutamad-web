<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $country = Country::pluck('code')->toArray();
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'username' => $this->faker->userName,
            'password' => bcrypt('12345678'),
            'profile_image' => null,
            'phone' => $this->faker->phoneNumber,
            'country' => Arr::random($country),
            'bio' => $this->faker->paragraph,
            'experience' => $this->faker->sentence,
            'role' => $this->faker->randomElement(['client', 'freelancer']),
            'category_id' => rand(1, 4),
            'earning' => $this->faker->randomFloat(2, 0, 10000),
            'wallet' => $this->faker->uuid,
            'wallet_balance' => $this->faker->randomFloat(2, 0, 1000),
            'agreed_terms_of_conditions' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
            'deactivate_reason' => $this->faker->sentence,
            'is_admin' => $this->faker->boolean,
            'resetToken' => Str::random(10),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
