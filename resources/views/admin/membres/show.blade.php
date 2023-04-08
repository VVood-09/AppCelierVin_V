@extends('layouts.admin')
@section('title', 'Admin')
@section('content')

<section class="formulaire_admin">
    <h1>Modification d'un membre</h1>
   
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
        <label for="nom">Nom</label>
        <input name="nom" type="text" placeholder="Nom" value="{{$utilisateur->name}}"
        x-model="formValues.nom" x-ref="nom" @blur="validateField('nom')" id="nom">
        
        <span x-text="errors.email" class="textError"></span>
        <label for="email">Courriel</label>
        <input name="email" type="email" placeholder="Courriel" value="{{$utilisateur->email}}"
            x-model="formValues.email" x-ref="email" @blur="validateField('email')" id="email">

        <label for="permission">Niveau d'accès</label>
        <select id="permission" name="permission_id" >
            @forelse($permissions as $permission)
            <option value="{{$permission->id}}" 
            @if($permission->id == $utilisateur->permission_id)
            selected
            @endif>
            {{$permission->permission}}</option>
            @empty
            @endforelse
        </select>
       
        <div class="admin_btn">
            <button class="btn-reverse"> <a href="{{ route('admin.membres.index') }}">Annuler</a></button>
            <input class="btn" type="submit" value="Mettre à jour">
        </div>
  </form>

    
</section>
@endsection