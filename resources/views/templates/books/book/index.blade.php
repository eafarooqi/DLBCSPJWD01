@extends('layouts.app')

@section('breadcrumbs')
    <x-template.breadcrumb :activePage="__('Books')" />
@endsection

@section('content')

    <main class="content">
        <div class="container-fluid p-0">

            <a href="{{ route('books.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> {{ __('Add New') }}</a>

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">{{ __('Books') }}</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <x-template.notification />
                    <div class="card">
                        <div class="card-body">
                            <livewire:books.data-tables.book-table />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
