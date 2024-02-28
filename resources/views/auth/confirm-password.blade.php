@extends('layouts.auth')
@section('content')

    <div class="text-center mt-4">
        <h1 class="h2">{{ __('Confirm Password') }}</h1>
        <p class="lead">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">

                <!-- Validation Errors -->
                <x-template.notification :showErrors="false" />

                <x-form.form class="m-t" :action="route('password.confirm')" novalidate hasJsValidation>

                    <x-form.input name="password" type="password" :placeholder="__('Password')" :wrap="false" :isRow="false" required autofocus />

                    <div class="text-center mt-3">
                        <x-button class="btn btn-lg btn-primary">
                            {{ __('Confirm') }}
                        </x-button>
                    </div>
                </x-form.form>

            </div>
        </div>
    </div>

@endsection
