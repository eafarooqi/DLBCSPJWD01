@extends('layouts.auth')
@section('content')

    <div class="text-center mt-4">
        <h1 class="h2">{{ config('app.name', 'Verify your email') }}</h1>
        <p class="lead">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another. Please remain login while verifying your email and use the same browser.') }}
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <x-template.notification :showErrors="true" />

                <x-form.form class="m-t" :action="route('verification.send')" novalidate>
                    <div class="text-center mt-3">
                        <x-button class="btn btn-lg btn-primary">
                            {{ __('Resend Verification Email') }}
                        </x-button>
                    </div>
                </x-form.form>

                <x-form.form class="m-t" :action="route('logout')" novalidate>
                    <div class="text-center mt-3">
                        <x-button class="btn btn-lg btn-primary">
                            {{ __('Log Out') }}
                        </x-button>
                    </div>
                </x-form.form>

            </div>
        </div>
    </div>

@endsection
