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
        // Removed 'email_verified_at' to avoid error from missing column.
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(), // ← tambahkan ini
            'email' => $this->faker->unique()->safeEmail(),
            'whatsapp' => $this->faker->numerify('628##########'), // optional kalau field-nya ada
            'password' => Hash::make('password'), // default
            'role' => 'user', // default role
            'remember_token' => Str::random(10),
        ];
    }

    // Removed the 'unverified' function, as 'email_verified_at' field does not exist.
}
