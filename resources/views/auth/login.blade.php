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

                <x-input x-ref="email" @blur="validateField('email')" placeholder='Courriel' 
                id="email" class="block mt-1 w-full" type="email" 
                name="email" value="{{old('email')}}" x-model="formValues.email" requif autofocus />
                <span x-text="errors.email" class="textError"></span>

            </div>

            <div class="">
                <x-input x-ref="password"  @blur="validateField('password')" placeholder='Mot de passe' id="password" class="block mt-1 w-full" type="password" value="{{old('password')}}" name="password" x-model="formValues.password" required autocomplete="current-password" />
                <span x-text="errors.password" class="textError"></span>

            </div>


            <div class="login_souvenir">
                <label for="remember_me">
                    <span class="">{{ __('Se souvenir de  moi') }}</span>
                    <input id="remember_me" type="checkbox" class="login_password" name="remember">
                </label>
            </div>

            

            <div >
            <div x-text="errors.warning" class="textError"></div>

                <x-button class="btn">
                    {{ __('Connexion') }}
                </x-button>

            </div>


        </form>
        <div class="lien">
            <a href="{{ route('register') }}">
                {{ __('Vous n\'avez pas un compte?') }}
            </a>
                 <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="Layer 2" id="Layer_2"><path d="M22,9a1,1,0,0,0,0,1.42l4.6,4.6H3.06a1,1,0,1,0,0,2H26.58L22,21.59A1,1,0,0,0,22,23a1,1,0,0,0,1.41,0l6.36-6.36a.88.88,0,0,0,0-1.27L23.42,9A1,1,0,0,0,22,9Z"/></g></svg>
        </div>
    </div>

    <div>
        <x-notification></x-notification>
    </div>
</section>


@endsection



               <!-- @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    <small>{{ __('Mot de Passe oublié?') }}</small>
                </a>
                @endif-->