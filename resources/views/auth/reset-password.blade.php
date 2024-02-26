@extends('layouts.auth')

@section('content')

    <div class="text-center mt-4">
        <h1 class="h2">{{ config('app.name', 'Reset Your Password') }}</h1>
        <p class="lead">
            {{ __('Please enter your email address, and your new password.') }}
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-template.notification :showErrors="true" />

                <x-form.form class="m-t" :action="route('password.store')" novalidate hasJsValidation>

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <x-form.input name="email" type="email" :placeholder="__('Email')" :value="$request->email" :wrap="false" :isRow="false" required autofocus />
                    <x-form.input name="password" type="password" :placeholder="__('Password')" :wrap="false" :isRow="false" required />
                    <x-form.input name="password_confirmation" type="password" :placeholder="__('Confirm Password')" :wrap="false" :isRow="false" required />

                    <div class="text-center mt-3">
                        <x-button class="btn btn-lg btn-primary">
                            {{ __('Reset Password') }}
                        </x-button>
                    </div>
                </x-form.form>

            </div>
        </div>
    </div>

@endsection
