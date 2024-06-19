<?php

namespace Tests\Unit;

use App\Dto\BookData;
use App\Services\OpenLibraryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\RequestException;
use Tests\TestCase;

class OpenLibraryServiceTest extends TestCase
{
    use RefreshDatabase;

    protected OpenLibraryService $openLibraryService;

    protected function setUp(): void
    {
        parent::setUp();

        // Initialize the GenreService
        $this->openLibraryService =  $this->app->make(OpenLibraryService::class);
    }

    /**
     * @throws RequestException
     */
    public function test_get_book_by_isbn_returns_book_data(): void
    {
        $isbn = '0007144091';
        $result = $this->openLibraryService->getBookByIsbn($isbn);
        $this->assertInstanceOf(BookData::class, $result);
        $this->assertEquals($isbn, $result->isbnSelected);
    }

    /**
     * @throws RequestException
     */
    public function test_search_books_by_Name(): void
    {
        $result = $this->openLibraryService->searchBooks('the lord of the rings');
        $this->assertIsArray($result);
    }

    /**
     * @throws RequestException
     */
    public function test_search_books_by_author(): void
    {
        $result = $this->openLibraryService->searchBooks(author: 'J. R. R. Tolkien');
        $this->assertIsArray($result);
    }

    /**
     * @throws RequestException
     */
    public function test_search_books_by_isbn(): void
    {
        $result = $this->openLibraryService->searchBooks(isbn: '0007144091');
        $this->assertCount(1, $result);
        $this->assertIsArray($result);
    }


    /**
     * @throws RequestException
     */
    public function test_search_books_returns_empty_array_when_no_results(): void
    {
        $result = $this->openLibraryService->searchBooks('NonExistentBOOK');
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }
}
