@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-12 mb-4">
                    <x-template.notification />

                    <div class="card shadow-sm components-section">
                        <div class="card-header border-bottom border-info">
                            {{ __('Profile') }}
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="py-12">
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                            <div class="max-w-xl">
                                                @include('profile.partials.update-profile-information-form')
                                            </div>
                                        </div>

                                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                            <div class="max-w-xl">
                                                @include('profile.partials.update-password-form')
                                            </div>
                                        </div>

                                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                            <div class="max-w-xl">
                                                @include('profile.partials.delete-user-form')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

@endsection
