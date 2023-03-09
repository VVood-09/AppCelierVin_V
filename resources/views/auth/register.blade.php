
@extends('layouts.app')
@section('title', 'Login')
@section('content')

    <section class="register_section"  >
        <h1>S'inscrire</h1>
     

        <!-- Validation Errors -->
        <div class="register_form" :errors="$errors" >

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>


                <x-input placeholder='Nom:' id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
          

                <x-input placeholder='Email:'  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">


                <x-input placeholder='Mot de passe:'  id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">


                <x-input  placeholder='Confirmation du mot de passe:'  id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Vous avez deja un compte?') }}
                </a>

                <x-button class="ml-4">
                    {{ __("S'inscrire") }}
                </x-button>
            </div>
        </form>
  </div>
</section>
@endsection