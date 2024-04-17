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
                <div class="col-12">
                    <x-template.notification />

                    <div class="card shadow-sm components-section">
                        <div class="card-header border-bottom border-info">
                            {{ __('Book') }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <x-form.show name="name" :label="__('Name')" :value="$book->name" />
                                    <x-form.show name="isbn" :label="__('ISBN')" :value="$book->isbn" />
                                    <x-form.show name="author" :label="__('Author')" :value="$book->author" />

                                    <x-form.show name="genre_id" :label="__('Genre')" :value="$book->genre->name" />
                                    <x-form.show name="category_id" :label="__('Category')" :value="$book->category->name" />

                                    <x-form.show name="description" :label="__('Description')" :value="$book->description" />
                                    <x-form.show name="total_pages" type="number" min="0" :label="__('Total Pages')" :value="$book->total_pages" />
                                    <x-form.show name="published_date" :label="__('Published Date')" :value="$book->name" />
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center ">
                                        <h2>{{ __('Book Cover') }}</h2>

                                        <div class="d-flex justify-content-center">
                                            <div class="cover-image-container text-center">

                                                @if ($book->cover)
                                                    <img alt="{{ $book->name }}" src="{{ $book->cover }}" class="img-responsive mt-2 image" width="200">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top border-success p-2 footer-light">
                            <a href="{{ route('books.index') }}" class="btn btn-primary float-end">{{ __('Back to overview') }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

@endsection

