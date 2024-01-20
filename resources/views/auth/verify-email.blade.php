@extends('frontend.auth.master')
@section('styles')
    <style>
        .custom-button{
            border: none;
            cursor: pointer;
            background: inherit;
            color: #2a71db;
        }
    </style>
@endsection
@section('auth-content')
    <div class="text-center mb10">
        <h1 class="">Please Verify Email</h1>
        <p class="mt2 pg2">Thanks for signing up! Before getting started, could you verify your email address by clicking on  the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
        @if (session('status') == 'verification-link-sent')
            <p class="mt2 pg2">A new verification link has been sent to the email address you provided during registration.</p>
        @endif
    </div>
    <form class="form" method="POST" action="{{ route('verification.send') }}">
        @csrf
        <div class="group buttons">
            <button class="button" type="submit">Resend Verification Email</button>
        </div>
    </form>
    <div class="mt4 mb4 separator flex" style="height: 22px;">
        <div style="flex: 1 1 0%; border-top: 1px solid var(--color-separator); margin-top: 11px;"></div>
        <p class="ml4 mr4 dark60@text pg2">or</p>
        <div style="flex: 1 1 0%; border-top: 1px solid var(--color-separator); margin-top: 11px;"></div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="mt4 flex justify-center">
            <small class="dark60@text">Want to Sign Out?
                <button type="submit" class="custom-button">Sign Out</button>
            </small>
        </div>
    </form>
@endsection