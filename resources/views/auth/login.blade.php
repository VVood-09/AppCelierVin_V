@extends('layouts.app')
@section('title', 'Connexion')
@section('content')
<section class="login_section">
    <h1>Connexion</h1>
    <div>
        <!-- Session Status -->
        <x-auth-session-status class="" :status="session('status')" />

        <x-auth-validation-errors class="" :errors="$errors" />

        <form class="login_form" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input placeholder='Email' id="email"  class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="">
                <x-input placeholder='Mot de passe' id="password"  class="block mt-1 w-full" 
                                 type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

   
            <div class="mt-4">
                <label for="remember_me" class="">
                    <input id="remember_me" type="checkbox" class="login_password" name="remember">
                    <span class="">{{ __('Se souvenir de  moi') }}</span>
                </label>
            </div>

            <div class="mt-4 login_btn">

                <x-button class="">
                    {{ __('Connexion') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                      <small>{{ __('Mot de Passe oublié?') }}</small>  
                    </a>
                @endif
            </div>
         
            
        </form>
        <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Vous n\'avez pas un compte?') }}
                </a>
        </div>
    </div>

    <div>
        <x-notification ></x-notification>
    </div>
</section>


@endsection