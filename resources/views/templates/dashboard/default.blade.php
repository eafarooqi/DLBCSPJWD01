@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>{{ __('Books Management System') }}</strong> {{ __('Dashboard') }}</h3>
                </div>

                <div class="col-auto ms-auto text-end mt-n1">
                    <a href="{{ route('books.index') }}" class="btn btn-light bg-white me-2">View All</a>
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Books</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $booksCount }}</h1>
                            <div class="mb-0">
                                <span class="text-muted">Total Books count</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Categories</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="fa-solid fa-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $categoriesCount }}</h1>
                            <div class="mb-0">
                                <span class="text-muted">Total Categories count</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Genres</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="fa-solid fa-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $genresCount }}</h1>
                            <div class="mb-0">
                                <span class="text-muted">Total Genres count</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
