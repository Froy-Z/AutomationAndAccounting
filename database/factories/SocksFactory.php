<?php

namespace Database\Factories;

use App\Models\Socks;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocksFactory extends Factory
{
    protected $model = Socks::class;

    public function definition(): array
    {
        return [
            'color' => $this->faker->randomElement(['yellow', 'red', 'black', 'white', 'green']),
            'cottonPart' => $this->faker->numberBetween(0,100),
            'quantity' => $this->faker->numberBetween(1,100),
        ];
    }
}
