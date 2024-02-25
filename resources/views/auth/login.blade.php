@extends('layouts.auth')

@section('content')

    <div class="text-center mt-4">
        <h1 class="h2">{{ config('app.name', 'BMS') }}</h1>
        <p class="lead">
            {{ __('Sign in to your account to continue') }}
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-template.notification :showErrors="true" />

                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif

                <x-form.form class="m-t" :action="route('login')" novalidate hasJsValidation>

                    <x-form.input id="email" name="email" type="email" placeholder="{{ __('Email') }}" :wrap="false" row="mb-3" :label="__('Email')" labelClass="form-label" required autofocus />
                    <div class="mb-3">
                        <label class="form-label">{{ __('Password') }}</label>

                        <x-form.input id="password" name="password" type="password" :placeholder="__('Password')" :wrap="false" :row="false" :label="false" required />
                        @if (Route::has('password.request'))
                            <small>
                                <a class="" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            </small>
                        @endif
                    </div>

                    <!-- Remember Me -->
                    <div>
                        <label for="remember_me" class="form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <span class="form-check-label">
                                {{ __('Remember me') }}
                            </span>
                        </label>
                    </div>

                    <div class="text-center mt-3">
                        <x-button class="btn btn-primary btn-lg">
                            {{ __('Log in') }}
                        </x-button>
                    </div>

                    <div class="text-center mt-2">
                        <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">{{ __('Create an account') }}</a>
                    </div>

                </x-form.form>

            </div>
        </div>
    </div>

@endsection
