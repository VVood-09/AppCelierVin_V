@extends('layouts.app')
@section('title', 'Login')
@section('content')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="" :status="session('status')" />


        <x-auth-validation-errors class="" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

         
            <div>
               

                <x-input placeholder='Email' id="email" class="login_email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

         
            <div class="">
              

                <x-input placeholder='Mot de passe' id="password" class=""
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

   
            <div class="">
                <label for="remember_me" class="">
                    <input id="remember_me" type="checkbox" class="login_password" name="remember">
                    <span class="">{{ __('Se souvenir de  moi') }}</span>
                </label>
            </div>

            <div class="">
                @if (Route::has('password.request'))
                    <a class="login_resetPassword-btn" href="{{ route('password.request') }}">
                        {{ __('Mot de Passe  oublie?') }}
                    </a>
                @endif

                <x-button class="login_btn">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection