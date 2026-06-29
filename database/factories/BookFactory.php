<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalCopies = $this->faker->numberBetween(1 , 50);
        
        return [
            'title' => $this->faker->sentence(4),
            'isbn' => $this->faker->unique()->isbn13(),
            'description' => $this->faker->paragraph(),
            'author_id' => Author::inRandomOrder()->first()?->id ?? Author::factory(),
            'genre' => $this->faker->randomElement(['Fiction' , 'Non-fiction' , 'Sci-Fi' , 'Fantasy' , 'Mystery' , 'Programming']),
            'published_at' => $this->faker->date(),
            'total_copies' => $totalCopies,
            'available_copies' => $this->faker->numberBetween(0 , $totalCopies),
            'cover_image' => $this->faker->imageUrl(200 , 300 , 'books' , true),
            'status' => $this->faker->randomElement(['active' , 'inactive']),
        ];
    }
}
