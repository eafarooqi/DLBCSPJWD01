@extends('layouts.auth')

@section('content')

    <div class="text-center mt-4">
        <h1 class="h2">{{ __('Registration') }}</h1>
        <p class="lead">
            {{ __('Create your new account') }}
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">

                <!-- Validation Errors -->
                <x-template.notification />

                <x-form.form class="m-t" :action="route('register')" novalidate hasJsValidation>

                    <!-- Name -->
                    <x-form.input name="name" :label="__('Name')" label-class="col-form-label" :placeholder="__('Enter your name')" :wrap="false" :isRow="false" required autofocus />

                    <!-- Email Address -->
                    <x-form.input name="email" type="email" :label="__('Email')" label-class="col-form-label" :wrap="false" :isRow="false" required :placeholder="__('Enter Your Email')" />

                    <!-- Password & Confirmation -->
                    <x-form.input name="password" type="password" :label="__('Password')" label-class="col-form-label" :wrap="false" :isRow="false" :placeholder="__('Enter password')" required />
                    <x-form.input name="password_confirmation" type="password" :label="__('Confirm Password')" :wrap="false" :isRow="false" labelClass="form-label" :placeholder="__('Confirm your password')" required />

                    <div class="text-center mt-3">
                        <x-button class="btn btn-primary block full-width mt-2 m-b">
                            {{ __('Register') }}
                        </x-button>
                    </div>

                    <a href="{{ route('login') }}">
                        <small>{{ __('Already registered?') }}</small>
                    </a>

                </x-form.form>

            </div>
        </div>
    </div>

@endsection
