@extends('layouts.app')

@section('breadcrumbs')
    <x-template.breadcrumb :activePage="$book->name" :links="[
        ['key' => __('Books'), 'url' => route('books.index')]
    ]" />
@endsection

@section('content')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">{{ __('Book') }}</h1>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <x-template.notification />

                    <x-form.form :action="route('books.update', $book->id)" method="PUT" novalidate hasJsValidation>

                        <div class="card shadow-sm components-section">
                            <div class="card-header border-bottom border-info">
                                {{ __('Book') }}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-form.input name="name" :label="__('Name')" :value="$book->name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top border-success p-2 footer-light">
                                <button type="submit" id="btnFormSubmit" class="btn btn-primary float-end">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </x-form.form>
                </div>
            </div>
        </div>
    </main>

@endsection

