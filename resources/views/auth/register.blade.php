
@extends('layouts.app')
@section('title', 'Inscription')
@section('content')

    <section class="register_section"  >
        <h1>S'inscrire</h1>
     

        <!-- Validation Errors -->
        <div class="register_form" :errors="$errors" >

        <form x-data="{
                formValues: {},
                errors: {},
                validateForm() {
                    
                    this.errors = {};
                    const requiredFields = ['nom', 'email', 'password', 'password_confirmation']
                    const missingFields = requiredFields.filter(field => !this.formValues[field]);

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
                        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))){
                            fieldErrors[field] = `Entrez une adresse courriel valide`;
                            isValid = false;
                        }
                    }
                    
                    if (field == 'password'){
                        if (password.value < 8) {
                            fieldErrors[field] = `8 caractères minimum`;
                            isValid = false;
                        }
                    }
                    if (field == 'password_validation'){
                        if (password_validation.value < 8) {
                            fieldErrors[field] = `8 caractères minimum`;
                            isValid = false;
                        }
                    }

                    this.errors = {...this.errors, ...fieldErrors};
                    console.log(this.errors)
                    return isValid;
                    },
            }"
        
        method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input x-model="formValues.nom" x-ref="nom" @blur="validateField('nom')" placeholder='Nom:' id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <span x-text="errors.nom" class="textError"></span>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input x-model="formValues.email" x-ref="email" @blur="validateField('email')" placeholder='Email:'  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <span x-text="errors.email" class="textError"></span>

            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input placeholder='Mot de passe:'  id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                                x-ref="password" @blur="validateField('password')"
                                x-model="formValues.password"
                                />
                <span x-text="errors.password" class="textError"></span>

            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input  placeholder='Confirmation du mot de passe:'  id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required 
                                x-ref="password_confirmation" @blur="validateField('password_confirmation')"
                                x-model="formValues.password_confirmation"
                                />
                <span x-text="errors.password_confirmation" class="textError"></span>

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