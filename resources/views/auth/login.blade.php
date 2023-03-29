@extends('layouts.app')
@section('title', 'Connexion')
@section('content')
<section class="login_section">
    <h1>Connexion</h1>
    <div>
        <!-- Session Status -->
        <x-auth-session-status class="" :status="session('status')" />

        <x-auth-validation-errors class="" :errors="$errors" />

        <form x-data="{
                formValues: {},
                errors: {},
                validateForm() {
                    
                    this.errors = {};
                    const requiredFields = ['email', 'password']
                    const missingFields = requiredFields.filter(field => !this.formValues[field]);
                    console.log(missingFields);

                    if (missingFields.length > 0) {
                        this.errors.recap = 'Remplir ce champ';
                        this.errors.warning = 'Champs manquant(s)';
                        return;
                    }

                },
                validateField(field) {
                    const fieldErrors = {};
                    let isValid = true;

                    if (!this.formValues[field]) {
                        fieldErrors[field] = `Le champ ${field} est obligatoire.`;
                        console.log(fieldErrors)
                        isValid = false;
                    }

                    if (field == 'email') {
                        fieldErrors[field] = ``;
                        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))){
                            fieldErrors[field] = `Entrez une adresse courriel valide`;
                            isValid = false;
                        }
                    }
                    
                    if (field == 'password'){
                        fieldErrors[field] = ``;
                        if (password.value < 8) {
                            fieldErrors[field] = `8 caractères minimum`;
                            isValid = false;
                        }
                    }

                    this.errors = {...this.errors, ...fieldErrors};
                    console.log(this.errors)
                    return isValid;
                    },
            }" class="login_form" method="POST"  action="{{ route('login') }}">
            <!-- }" class="login_form" method="POST"  @submit.prevent="validateForm()"> -->
            @csrf

            <div>

                <x-input x-ref="email" @blur="validateField('email')" placeholder='Email' 
                id="email" class="block mt-1 w-full" type="email" 
                name="email" value="{{old('email')}}" x-model="formValues.email" requif autofocus />
                <span x-text="errors.email" class="textError"></span>

            </div>

            <div class="">
                <x-input x-ref="password"  @blur="validateField('password')" placeholder='Mot de passe' id="password" class="block mt-1 w-full" type="password" value="{{old('password')}}" name="password" x-model="formValues.password" required autocomplete="current-password" />
                <span x-text="errors.password" class="textError"></span>

            </div>


            <div class="mt-4">
                <label for="remember_me" class="">
                    <input id="remember_me" type="checkbox" class="login_password" name="remember">
                    <span class="">{{ __('Se souvenir de  moi') }}</span>
                </label>
            </div>

            

            <div class="mt-4 login_btn">
            <div x-text="errors.warning" class="textError"></div>

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
        <x-notification></x-notification>
    </div>
</section>


@endsection