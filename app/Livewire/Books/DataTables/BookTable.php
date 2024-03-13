<?php

namespace App\Livewire\Books\DataTables;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Facades\Filter,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridFields};

final class BookTable extends PowerGridComponent
{
    public $searching;
    public $page;
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

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<Genre>
    */
    public function datasource(): Builder
    {
        return Book::query();
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
            ->add('isbn');
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
            Column::make(__('ISBN'), 'isbn')
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
            Filter::inputText('isbn')->operators(['contains'])
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Genre Action Buttons.
     *
     * @return array<int, Button>
     */
    public function actions(Genre $row): array
    {
       return [
           Button::add('edit')
               ->slot('Edit')
               ->icon('edit', ['class' => 'fa-solid fa-pen-to-square me-1'])
               ->class('btn btn-primary btn-sm float-start')
               ->route('manage.genres.edit', ['genre' => $row->id]),

           Button::make('show', 'Show')
               ->class('btn btn-secondary btn-sm float-start')
               ->route('manage.genres.show', ['genre' => $row->id])
               ->target('_self'),

           Button::make('destroy', 'Delete')
               ->class('btn btn-danger btn-sm float-start doWithConfirmation')
               ->route('manage.genres.destroy', ['genre' => $row->id])
               ->method('delete')
               ->target('_self')
        ];
    }
}
