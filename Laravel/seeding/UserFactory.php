<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'email' => fake()->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => static::$password ??= Hash::make('password'),
        'drid' => fake()->numberBetween(1, 1000), // Assuming a range of 1-1000 for drid
        'ptid' => fake()->numberBetween(1, 1000), // Assuming a range of 1-1000 for ptid
        'status' => fake()->numberBetween(0, 1), // Assuming 0 or 1 for status (tinyint)
        'sms_alerts' => fake()->numberBetween(0, 1), // Assuming 0 or 1 for sms_alerts (tinyint)
        'email_alerts' => fake()->numberBetween(0, 1), // Assuming 0 or 1 for email_alerts (tinyint)
        'auth_code' => fake()->uuid, // Generating a random UUID string for auth_code
        'remember_token' => Str::random(10),
    ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
