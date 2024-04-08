<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roleIds = Role::all()->pluck("id");

        return [
            "date_of_birth" => $this->faker->date,
            "firstname" => $this->faker->name,
            "lastname" => $this->faker->lastName,
            "user_id" => User::factory(),
            "role_id" => $this->faker->randomElement($roleIds),
        ];
    }
}
