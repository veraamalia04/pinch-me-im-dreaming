<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rt' => fake()->numberBetween(1, 20),
            'rw' => fake()->numberBetween(1, 20),
            'kecamatan' => fake()->citySuffix(),
            'kota' => fake()->city(),
            'kelurahan' => fake()->streetName(),
            'alamat' => fake()->streetAddress(),
            'kode_pos' => fake()->postcode(),
            'is_active' => true,
        ];
    }
}
