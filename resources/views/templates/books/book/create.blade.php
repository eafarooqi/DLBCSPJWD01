@extends('layouts.app')

@section('breadcrumbs')
    <x-template.breadcrumb :activePage="__('Add New')" :links="[
        ['key' => __('Books'), 'url' => route('books.index')]
    ]" />
@endsection

@section('content')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">{{ __('Books') }}</h1>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <x-template.notification />

                    <x-form.form :action="route('books.store')" novalidate hasJsValidation>
                        <div class="card shadow-sm components-section">
                            <div class="card-header border-bottom border-info">
                                {{ __('Book') }}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-form.input name="name" :label="__('Name')" required />
                                        <x-form.input name="isbn" :label="__('ISBN')" />
                                        <x-form.input name="author" :label="__('Author')" />

                                        <x-form.tom-select name="genre_id" :label="__('Genre')" :options="$genreOptions" />

                                        <x-form.textarea name="description" :label="__('Description')" />
                                        <x-form.input type="number" min="0" name="total_pages" :label="__('Total Pages')" />
                                        <x-form.flat-pickr name="published_date" :label="__('Published Date')" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top border-success p-2 footer-light">
                                <button type="submit" id="btnFormSubmit" class="btn btn-primary float-end">{{ __('Add') }}</button>
                            </div>
                        </div>
                    </x-form.form>

                </div>
            </div>
        </div>
    </main>

@endsection

