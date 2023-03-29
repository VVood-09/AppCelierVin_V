@extends('layouts.app')
@section('title', 'Ajouter cellier')
@section('content')


<section class="formCellier">
  <h1>Créer un nouveau cellier</h1>
  <form x-data="{
    formValues: {},
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

        if (field == 'nom') {
            if (nom.value.length > 8) {
                fieldErrors[field] = `8 caractères maximum`;
                isValid = false;
            }
        }
        this.errors = {...this.errors, ...fieldErrors};
        console.log(this.errors)
        return isValid;
    }
}"
  
  action="" method="post">
    @csrf
      <div class="formCellier_input">
      <span x-text="errors.nom" class="textError"></span>
        <input placeholder="Nom du Cellier" type="text" id="nom" name="nom" class="form-control" 
        value="{{old('nom')}}" maxlength="8"
        x-model="formValues.nom" x-ref="nom" @blur="validateField('nom')"
        >
      </div>
      <div class="formCellier_btn">
          <input type="submit" name="" id="" value="Créer" class="btn ">
          <a href="{{ route ('dashboard')}}" class="btn-reverse ">Annuler</a>
      </div>
  </form>
</section>

 @endsection