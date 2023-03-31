@extends('layouts.app')
@section('title', 'Modifier Profil')
@section('content')
   

<div class="formBtl">
  <h1>Modification de votre compte</h1>

  <form x-data="{
    formValues: {
      nom: '{{$utilisateur->name}}',
      email: '{{$utilisateur->email}}'
    },
    errors: {},

    validateField(field) {
        const fieldErrors = {};
        let isValid = true;
        fieldErrors[field] = ``;

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


        this.errors = {...this.errors, ...fieldErrors};
        console.log(this.errors)
        return isValid;
    }

  }"
  
  class="formBtl_form"   method="post" action="">
    @csrf
    @method('put')
     
    <span x-text="errors.nom" class="textError"></span>
    <input name="nom" type="text" placeholder="Nom" value="{{$utilisateur->name}}"
          x-model="formValues.nom" x-ref="nom" @blur="validateField('nom')" id="nom">
    <span x-text="errors.email" class="textError"></span>
    <input name="email" type="email" placeholder="Courriel" value="{{$utilisateur->email}}"
        x-model="formValues.email" x-ref="email" @blur="validateField('email')" id="email">
    <input class="btn"  type="submit" value="Modifier">
       
  </form>

  <?php
    $action = 'supprimer le compte';
    $route = route('utilisateur.delete', ['id' => $utilisateur->id]);
  ?>
</div>

<div>
  <x-modal_suppresion route="{{ $route }}" trigger-text="Supprimer le compte">
    Êtes-vous certain de vouloir {{  $action }} ?
  </x-modal_suppresion>
</div>


@endsection