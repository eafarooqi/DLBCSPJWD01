<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'isbn' => $this->faker->word(),
            'author' => $this->faker->word(),
            'description' => $this->faker->text(),
            'published_date' => Carbon::now(),
            'total_pages' => $this->faker->randomNumber(),
        ];
    }
}
