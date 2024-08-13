<?php

namespace App\Services;

use App\Dto\BookData;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;

final readonly class OpenLibraryService
{
    public function __construct(
        private PendingRequest $client,
    ) {}

    /**
     * search book by isbn on open library.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function getBookByIsbn(string $isbn): ?BookData
    {
        $data = $this->search(['isbn'=>  $isbn]);

        if($data->count() > 0)
        {
            return BookData::from($data->first());
        }

        return null;
    }


    /**
     * search books on open library with given filters.
     *
     * @param string|null $name
     * @param string|null $author
     * @param string|null $isbn
     * @return array
     * @throws RequestException
     * @throws ConnectionException
     */
    public function searchBooks(string $name=null, string $author=null, string $isbn=null): array
    {
        // preparing query string
        $qryItems = [
            'title' => $name,
            'author' => $author,
            'isbn' => $isbn,
            'limit' => 100,
        ];

        // searching books.
        $rawData = $this->search($this->prepareQueryString($qryItems));

        // getting book data and parsing into BookData class
        $data = BookData::collect($rawData->toArray());

        // returning data as array
        return collect($data)->toArray();
    }


    /**
     * open library Search api call.
     *
     * @param array $query
     * @return Collection
     * @throws RequestException
     * @throws ConnectionException
     */
    protected function search(array $query): Collection
    {
        // calling search.json api
        $response = $this->client
            ->get('search.json', $query)
            ->throw();

        if($response->successful())
        {
            $responseObj = $response->collect();

            // if no results were found.
            if($responseObj->get('numFound')  == 0){
                return collect([]);
            }

            // returning results as collection.
            return collect($responseObj->get('docs'));
        }

        // Returning empty if error occurs
        return collect([]);
    }

    /**
     * Generate URL-encoded query string from array
     *
     * @param array $queryItems
     * @return array
     */
    private function prepareQueryString(array $queryItems): array
    {
        return array_filter($queryItems);
    }
}
