<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Partner;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?string $password;

    public function definition(): array
    {
        $nationality = $this->faker->randomElement([
            'Myanmar', 'Philippines', 'Thailand', 
            'Vietnam', 'Indonesia', 'Cambodia', 
            'Laos'
        ]);

        $prefix = strtoupper(substr($nationality, 0, 2));

        $lastId = Partner::max('id') + 1;

        return [
            'partner_id' => 'PT -' . 
            str_pad($lastId, 3, '0', STR_PAD_LEFT) . '-' . $prefix,
            'partner_name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'partner_address' => $this->faker->word(),
            'partner_nationality' => $nationality,
            'password' => Hash::make('password'),
        ];
    }
}
