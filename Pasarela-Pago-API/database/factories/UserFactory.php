<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition(): array
    {
        return [
            'name'              => $this->faker->name(),
            'email'             => $this->faker->unique()->safeEmail(),
            'password'          => bcrypt('password'),
            'isAdmin'           => false,
            'remember_token'    => Str::random(10),
        ];
    }

    public function admin(): static
    {
        return $this->state(fn(array $attrs) => [
            'isAdmin' => true,
        ]);
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attrs) => [
            'email_verified_at' => null,
        ]);
    }
}
