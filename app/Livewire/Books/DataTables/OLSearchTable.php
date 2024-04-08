<?php

namespace App\Livewire\Books\DataTables;

use App\Dto\BookData;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Facades\Filter,
    Facades\Rule,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridFields};
use Illuminate\Support\Collection;

final class OLSearchTable extends PowerGridComponent
{
    public $data;
    public $searching;
    public $page;
    public string $primaryKey = 'isbnSelected';
    protected $queryString = [
        'searching' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->persist(['columns', 'filters']);

        return [
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /**
     * PowerGrid datasource.
     *
     */
    public function datasource(): ?Collection
    {
        return collect(
            $this->data,
        );
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('name')
            ->add('author');
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make(__('Title'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Author'), 'author')
                ->sortable()
                ->searchable(),
            Column::action('Action')->headerAttribute('text-center', '')
                ->bodyAttribute('', 'width: 250px;'),
        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
        ];
    }

    /**
     * PowerGrid Genre Action Buttons.
     *
     * @return array<int, Button>
     */
    public function actions($row): array
    {
        //dd($row);
        return [
            Button::add('edit')
                ->slot('Edit')
                ->icon('edit', ['class' => 'fa-solid fa-pen-to-square me-1'])
                ->class('btn btn-primary btn-sm float-start'),
                //->route('books.edit', ['book' => $row->isbnSelected]),
        ];
    }

    // Rules
    public function actionRules(): array
    {
        return [
            // Hide order button when dish is out-of-stock
            Rule::button('edit')
                ->hide(),
        ];
    }
}
