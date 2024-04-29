<?php

namespace App\Livewire\Books\DataTables;

use App\Models\Book;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class OLSearchTable extends PowerGridComponent
{
    public $olSearchData;

    public function datasource(): ?Collection
    {
        return collect($this->olSearchData);
    }

    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('isbnSelected')
            ->add('name')
            ->add('author')
            ->add('image_url', function ($model) {
                return '<img src="' . ($model->imageUrl ?? '') . '" width=50px />';
            })
            ->add('book_url', function ($model) {
                if(!($model->bookUrl ?? null)){
                    return null;
                }

                return '<a target="_blank" class="fs-4" href="' . $model->bookUrl . '"/><i class="fa-solid fa-up-right-from-square"></i></a>';
            })
            ->add('bookUrl');
    }

    public function columns(): array
    {
        return [
            Column::make('Image', 'image_url')
                ->searchable()
                ->sortable(),
            Column::make('ISBN', 'isbnSelected')
                ->searchable()
                ->sortable(),

            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Author', 'author')
                ->searchable()
                ->sortable(),

            Column::make('URL', 'book_url')
                ->searchable()
                ->sortable()
                ->headerAttribute('text-center', '')
                ->bodyAttribute('text-center', 'width: 100px;'),

            Column::action('Action')->headerAttribute('text-center', '')
                ->bodyAttribute('', 'width: 150px;'),
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
    public function actions($row): array
    {
        return [
            Button::make('show', 'Show')
                //->icon('show', ['class' => 'fa-solid fa-eye me-1'])
                ->class('btn btn-info btn-sm float-start')
                ->dispatchTo('books.modal.details-modal', 'loadBookDetails', ['details' => $row]),
        ];
    }
}
