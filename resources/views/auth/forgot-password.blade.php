@extends('layouts.auth')
@section('content')

    <div class="text-center mt-4">
        <h1 class="h2">{{ __('Forgot Password') }}</h1>
        <p class="lead">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-template.notification :showErrors="false" />

                <x-form.form class="m-t" :action="route('password.email')" novalidate hasJsValidation>

                    <x-form.input name="email" type="email" :placeholder="__('Email')" :wrap="false" :isRow="false" required autofocus />

                    <div class="text-center mt-3">
                        <x-button class="btn btn-lg btn-primary">
                            {{ __('Email Password Reset Link') }}
                        </x-button>
                    </div>
                    <a href="<?php echo route('login') ?>">
                        <small>{{ __('Sign in') }}</small>
                    </a>
                </x-form.form>

            </div>
        </div>
    </div>

@endsection
