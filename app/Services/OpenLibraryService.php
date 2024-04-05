<?php

namespace App\Services;

use App\Dto\BookData;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;

final readonly class OpenLibraryService
{
    public function __construct(
        private PendingRequest $client,
    ) {}

    /**
     * @throws RequestException
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
     * @throws RequestException
     */
    public function searchBooks(string $name=null, string $author=null, string $isbn=null): ?Collection
    {
        // preparing query string
        $qryItems = [
            'title' => $name,
            'author' => $author,
            'isbn' => $isbn,
            'limit' => 100,
        ];

        $rawData = $this->search($this->prepareQueryString($qryItems));

        $data = BookData::collect($rawData->toArray());

        dd($data);
    }

    /**
     * @throws RequestException
     */
    protected function search(array $query): Collection
    {
        $response = $this->client
            ->get('search.json', $query)
            ->throw();

        if($response->successful())
        {
            $responseObj = $response->collect();

            if($responseObj->get('numFound')  == 0){
                return collect([]);
            }

            return collect($responseObj->get('docs'));
        }

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
