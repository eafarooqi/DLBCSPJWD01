@extends('layouts.app')

@section('breadcrumbs')
    <x-template.breadcrumb :activePage="__('Open Library Search')" />
@endsection

@section('content')


    <main class="content">
        <div class="container-fluid p-0">

            <x-template.notification />

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">{{ __('Open Library Books Search') }}</h1>
            </div>

            <x-form.form :action="route('ol-search')" novalidate hasJsValidation>

                <div class="card shadow-sm components-section">
                    <div class="card-header border-bottom border-info">
                        {{ __('Search') }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <x-form.input name="name" :label="__('Name')" value="{{ $search['name'] ?? '' }}" />
                                <x-form.input name="author" :label="__('Author')" value="{{ $search['author'] ?? '' }}" />
                                <x-form.input name="isbn" :label="__('ISBN')" value="{{ $search['isbn'] ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top border-success p-2 footer-light">
                        <button type="submit" id="btnFormSubmit" class="btn btn-primary float-end">{{ __('Search') }}</button>
                    </div>
                </div>

            </x-form.form>

            @if($books ?? null)

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <livewire:books.data-tables.o-l-search-table :ol-search-data="$books" />
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </main>

@endsection

@section('modals')
    @parent
    <livewire:books.modal.details-modal />
@endsection


