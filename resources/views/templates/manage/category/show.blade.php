@extends('layouts.app')

@section('breadcrumbs')
    <x-template.breadcrumb :activePage="$category->name" :links="[
        ['key' => __('Categories'), 'url' => route('manage.categories.index')]
    ]" />
@endsection

@section('content')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">{{ __('Category') }}</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <x-template.notification />

                    <div class="card shadow-sm components-section">
                        <div class="card-header border-bottom border-info">
                            {{ __('Category') }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <x-form.show name="name" :label="__('Name')" :value="$category->name" required />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top border-success p-2 footer-light">
                            <a href="{{ route('manage.categories.index') }}" class="btn btn-primary float-end">{{ __('Back to overview') }}</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

@endsection

