<?php

namespace App\Livewire\Management\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Facades\Filter,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridFields};

final class CategoryTable extends PowerGridComponent
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
    * @return Builder<Category>
    */
    public function datasource(): Builder
    {
        return Category::query()->with(['parent']);
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
            ->add('parent_id', function (Category $category) {
                return $category->parent?->name;
            });
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
            Column::make(__('Category'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Parent'), 'parent_id')
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
            Filter::select('parent_id', 'parent_id')
                ->dataSource(Category::OptionsWithCacheIndexed(query: Category::parents()))
                ->optionValue('id')
                ->optionLabel('name'),
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
    public function actions(Category $row): array
    {
       return [
           Button::add('edit')
               ->slot('Edit')
               ->icon('edit', ['class' => 'fa-solid fa-pen-to-square me-1'])
               ->class('btn btn-primary btn-sm float-start')
               ->route('manage.categories.edit', ['category' => $row->id]),

           Button::make('show', 'Show')
               ->class('btn btn-secondary btn-sm float-start')
               ->route('manage.categories.show', ['category' => $row->id])
               ->target('_self'),

           Button::make('destroy', 'Delete')
               ->class('btn btn-danger btn-sm float-start doWithConfirmation')
               ->route('manage.categories.destroy', ['category' => $row->id])
               ->method('delete')
               ->target('_self')
        ];
    }
}
