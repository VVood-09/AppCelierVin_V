
@extends('layouts.app')
@section('title', 'Inscription')
@section('content')

    <section class="register_section"  >
        <h1>Inscription</h1>
     
        <!-- Validation Errors -->
        <div class="register_form" :errors="$errors" >
            <x-auth-validation-errors :errors="$errors" />

<!-- Fonction de validation des champs du formulaire -->  
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
                        fieldErrors[field] = ``;

                        if (!this.formValues[field]) {
                            fieldErrors[field] = `Le champ ${field} est obligatoire.`;
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
                        if (field == 'password_confirmation'){
                            fieldErrors[field] = ``;
                            if (password_confirmation.value < 8) {
                                fieldErrors[field] = `8 caractères minimum`;
                                isValid = false;
                            }
                        }

                        this.errors = {...this.errors, ...fieldErrors};
                        return isValid;
                        },
                }"
            
            method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input x-model="formValues.nom" x-ref="nom" @blur="validateField('nom')" placeholder='Nom' id="name"  type="text" name="name" :value="old('name')" required autofocus aria-label="nom" />
                    <span x-text="errors.nom" class="textError"></span>
                </div>

                <!-- Email Address -->
                <div >
                    <x-input x-model="formValues.email" x-ref="email" @blur="validateField('email')" placeholder='Courriel'  id="email" type="email" name="email" :value="old('email')" required aria-label="Email" />
                    <span x-text="errors.email" class="textError"></span>

                </div>

                <!-- Password -->
                <div >
                    <x-input placeholder='Mot de passe'  id="password" 
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" 
                                    x-ref="password" @blur="validateField('password')"
                                    x-model="formValues.password"
                                    aria-label="Mot de Passe"
                                    />
                    <span x-text="errors.password" class="textError"></span>

                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input  placeholder='Confirmation du mot de passe'  id="password_confirmation" 
                                    type="password"
                                    name="password_confirmation" required 
                                    x-ref="password_confirmation" @blur="validateField('password_confirmation')"
                                    x-model="formValues.password_confirmation" aria-label="Confirmation Mot de passe"
                                    />
                    <span x-text="errors.password_confirmation" class="textError"></span>

                </div>

                <div>
                    <x-button class="btn">
                        {{ __("S'inscrire") }}
                    </x-button>
                </div>

                <div class="lien">
                    <a  href="{{ route('login') }}">
                        {{ __('Vous avez déjà un compte?') }} 
                    </a>
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="Layer 2" id="Layer_2"><path d="M22,9a1,1,0,0,0,0,1.42l4.6,4.6H3.06a1,1,0,1,0,0,2H26.58L22,21.59A1,1,0,0,0,22,23a1,1,0,0,0,1.41,0l6.36-6.36a.88.88,0,0,0,0-1.27L23.42,9A1,1,0,0,0,22,9Z"/></g></svg>
                </div>
            </form>
        </div>
    </section>
@endsection