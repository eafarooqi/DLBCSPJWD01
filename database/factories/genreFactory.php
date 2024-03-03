<?php

namespace Database\Factories;

use App\Models\genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class genreFactory extends Factory
{
    protected $model = genre::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
