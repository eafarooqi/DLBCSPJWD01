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
                    <livewire:books.crud.add-book />
                </div>
            </div>
        </div>
    </main>

@endsection

