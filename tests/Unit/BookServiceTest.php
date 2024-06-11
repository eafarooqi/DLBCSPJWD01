<?php

namespace Tests\Unit;

use App\Livewire\Books\Crud\AddBook;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\GenreService;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class BookServiceTest extends TestCase
{
    use RefreshDatabase;

    protected BookService $bookService;
    protected GenreService $genreService;
    protected CategoryService $categoryService;

    protected function setUp(): void
    {
        parent::setUp();

        // Initialize the Service Classes
        $this->bookService = new BookService;
        $this->genreService = new GenreService;
        $this->categoryService = new CategoryService;
    }

    public function test_add_book()
    {
        // creating user for testing
        $user = $this->createUserForTesting();

        // creating required data to test book creation function
        $data = ['name' => 'New Genre'];
        $genre = $this->genreService->addGenre($data);

        $data = ['name' => 'New Category'];
        $category = $this->categoryService->addCategory($data);

        // Data for the new book
        $data = [
            'name' => 'New Book',
            'isbn' => '123-4567890123',
            'author' => 'Test Author',
            'genre_id' => $genre->id,
            'category_id' => $category->id,
            'description' => 'This is a test book description.',
            'published_date' => '2023-01-01',
            'total_pages' => 300,
            'url' => 'https://openlibrary.org/books/OL7262250M'
        ];

        // creating new genre
        $book = $this->bookService->addBook($data);

        // Assert that the returned book is an object and has the correct attributes
        $this->assertInstanceOf(Book::class, $book);
        $this->assertEquals('New Book', $book->name);
        $this->assertEquals('123-4567890123', $book->isbn);
        $this->assertEquals('Test Author', $book->author);
        $this->assertEquals($genre->id, $book->genre_id);
        $this->assertEquals($category->id, $book->category_id);
        $this->assertEquals('This is a test book description.', $book->description);
        $this->assertEquals('2023-01-01', $book->published_date->format('Y-m-d'));
        $this->assertInstanceOf(Carbon::class, $book->published_date);
        $this->assertEquals(300, $book->total_pages);
        $this->assertEquals('https://openlibrary.org/books/OL7262250M', $book->url);

        // book should belong to logged-in user.
        $this->assertEquals($user->id, $book->user_id);
    }

    public function test_update_book()
    {
        // creating user for testing
        $this->createUserForTesting();

        // Create a book
        $book = Book::factory()->create([
            'name' => 'Old Book',
        ]);

        // New data to update the book
        $data = [
            'name' => 'Updated Book',
        ];

        // Call the updateBook method
        $result = $this->bookService->updateBook($book, $data);

        // Refresh the book instance to get the updated values
        $book->refresh();

        // Assert that the update was successful
        $this->assertTrue($result);
        $this->assertEquals('Updated Book', $book->name);
    }

    public function test_delete_book()
    {
        // creating user for testing
        $this->createUserForTesting();

        // Create a book
        $book = Book::factory()->create([
            'name' => 'Test Genre',
        ]);

        // Call the deleteCategory method
        $result = $this->bookService->deleteBook($book);

        // Assert that delete result was successful
        $this->assertTrue($result);

        // Assert that the book was deleted (soft delete)
        $this->assertSoftDeleted('books', ['id' => $book->id]);
    }

    public function test_get_book_options()
    {
        // creating user for testing
        $this->createUserForTesting();

        // Create some genres
        $genre1 = Genre::factory()->create(['name' => 'Genre 1']);
        $genre2 = Genre::factory()->create(['name' => 'Genre 2']);

        // Create some categories
        $category1 = Category::factory()->create(['name' => 'Category 1']);
        $category2 = Category::factory()->create(['name' => 'Category 2']);

        // Ensure the cache is empty
        Cache::forget('GenreOptions');
        Cache::forget('CategoryOptions_opt_group');

        // Call the getGenreOptions method
        $result = $this->bookService->getBookCrudOptions();

        // Assert that the result is a collection
        $this->assertIsArray($result);
        $this->assertInstanceOf(Collection::class, $result['genreOptions']);
        $this->assertInstanceOf(Collection::class, $result['categoryOptions']);

        // Assert that the results are not empty
        $this->assertNotNull($result['genreOptions']);
        $this->assertNotNull($result['categoryOptions']);

         // Assert that the result contains the correct genre data
        $this->assertEquals([
            $genre1->id => 'Genre 1',
            $genre2->id => 'Genre 2',
        ], $result['genreOptions']->toArray());

        // Assert that the result contains the correct category data
        $this->assertEquals([
            $category1->id => 'Category 1',
            $category2->id => 'Category 2',
        ], $result['categoryOptions']->pluck('name', 'id')->toArray());
    }

    public function test_attach_cover()
    {
        // creating user for testing
        $this->createUserForTesting();

        $book = Book::factory()->make(['id' => 1]);
        $imageUrl = 'https://covers.openlibrary.org/b/isbn/0007144091-M.jpg';
        $fileName = '1.jpg';

        Storage::fake('covers');

        $this->withoutExceptionHandling();
        $result = $this->bookService->attachCover($book, null, $imageUrl);
        Storage::disk('covers')->assertExists($fileName);
        $this->assertTrue($result);
        $this->assertEquals('/storage/'. $fileName, $book->cover);
    }
}
