@extends('layouts.app')
@section('title', 'Modifier Profil')
@section('content')
   
  <a href="{{ route('utilisateur.show', Auth::user()->id)}}" class="retour"> <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512"><path d="M352 115.4 331.3 96 160 256l171.3 160 20.7-19.3L201.5 256z" fill="#7e001e" class="fill-000000"></path></svg>Retour</a>

<div class="formBtl">
  <h1>Modification de votre compte</h1>

<!-- Fonction de validation des champs du formulaire -->
  <form x-data="{
    formValues: {
      nom: `{{$utilisateur->name}}`,
      email: `{{$utilisateur->email}}`
    },
    errors: {},

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

        this.errors = {...this.errors, ...fieldErrors};
        return isValid;
    }
  }"
  
  class="formBtl_form"   method="post" action="">
    @csrf
    @method('put')
     
    <span x-text="errors.nom" class="textError"></span>
    <input name="nom" type="text" placeholder="Nom" value="{{$utilisateur->name}}" x-model="formValues.nom" x-ref="nom" @blur="validateField('nom')" id="nom" aria-label="nom">
    
    <span x-text="errors.email" class="textError"></span>
    <input name="email" type="email" placeholder="Courriel" value="{{$utilisateur->email}}" x-model="formValues.email" x-ref="email" @blur="validateField('email')" id="email" aria-label="email">
    
    <input class="btn"  type="submit" value="Modifier" aria-label="modifier">
       
  </form>

  <?php
    $action = 'supprimer le compte';
    $route = route('utilisateur.delete', ['id' => $utilisateur->id]);
  ?>
</div>

<!-- Appel au modal de suppression + création des valeurs nécessaires au modal-->
<div>
  <x-modal_suppresion route="{{ $route }}" trigger-text="Supprimer le compte">
    Êtes-vous certain de vouloir {{  $action }} ?
  </x-modal_suppresion>
</div>


@endsection