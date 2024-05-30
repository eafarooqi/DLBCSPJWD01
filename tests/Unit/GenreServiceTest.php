<?php

namespace Tests\Unit;

use App\Models\Genre;
use App\Services\GenreService;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class GenreServiceTest extends TestCase
{
    use RefreshDatabase;

    protected GenreService $genreService;

    protected function setUp(): void
    {
        parent::setUp();

        // Initialize the GenreService
        $this->genreService = new GenreService;
    }

    public function test_add_genre()
    {
        // creating user for testing
        $user = $this->createUserForTesting();

        // Data for the new genre
        $data = [
            'name' => 'New Genre',
        ];

        // creating new genre
        $genre = $this->genreService->addGenre($data);

        // Assert that the returned genre is an object and has the correct attributes
        $this->assertInstanceOf(Genre::class, $genre);
        $this->assertEquals('New Genre', $genre->name);
        $this->assertEquals($user->id, $genre->user_id);
    }

    public function test_update_genre()
    {
        // creating user for testing
        $this->createUserForTesting();

        // Create a genre
        $genre = Genre::factory()->create([
            'name' => 'Old Genre',
        ]);

        // New data to update the genre
        $data = [
            'name' => 'Updated Genre',
        ];

        // Call the updateGenre method
        $result = $this->genreService->updateGenre($genre, $data);

        // Refresh the genre instance to get the updated values
        $genre->refresh();

        // Assert that the update was successful
        $this->assertTrue($result);
        $this->assertEquals('Updated Genre', $genre->name);
    }

    public function test_delete_genre()
    {
        // creating user for testing
        $this->createUserForTesting();

        // Create a genre
        $genre = Genre::factory()->create([
            'name' => 'Test Genre',
        ]);

        // Call the deleteCategory method
        $result = $this->genreService->deleteGenre($genre);

        // Assert that delete result was successful
        $this->assertTrue($result);

        // Assert that the genre was deleted (soft delete)
        $this->assertSoftDeleted('genres', ['id' => $genre->id]);
    }

    public function test_get_genre_options()
    {
        // creating user for testing
        $this->createUserForTesting();

        // Create some genres
        $genre1 = Genre::factory()->create(['name' => 'Genre 1']);
        $genre2 = Genre::factory()->create(['name' => 'Genre 2']);

        // Ensure the cache is empty
        Cache::forget('GenreOptions');

        // Call the getGenreOptions method
        $result = $this->genreService->getGenreOptions();

        // Assert that the result is a collection
        $this->assertInstanceOf(Collection::class, $result);

        // Assert that the result contains the correct genres
        $this->assertEquals([
            $genre1->id => 'Genre 1',
            $genre2->id => 'Genre 2',
        ], $result->toArray());

        // Assert that the result is cached
        $cachedResult = Cache::get('GenreOptions');

        $this->assertNotNull($cachedResult);
        $this->assertEquals($result->toArray(), $cachedResult->toArray());
    }
}
