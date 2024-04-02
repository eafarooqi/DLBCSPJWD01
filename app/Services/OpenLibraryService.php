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
    public function search(string $type, string $qry): Collection
    {
        $response = $this->client
            ->withUrlParameters(['type' => $type, 'qry' => $qry])
            ->get('search.json/?{type}={qry}')
            ->throw();

        if($response->successful())
        {
            $responseObj = $response->collect();

            //dd($responseObj->get('docs'));

            if($responseObj->get('numFound')  == 0){
                return collect([]);
            }

            return collect($responseObj->get('docs'));
        }

        return collect([]);
    }

    /**
     * @throws RequestException
     */
    public function getBookByIsbn(string $isbn): ?BookData
    {
        $data = $this->search('isbn',  $isbn);

        if($data->count() > 0)
        {
            return BookData::from($data->first());
        }

        return null;
    }
}
