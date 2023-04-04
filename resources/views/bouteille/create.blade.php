@extends('layouts.app')
@section('title', 'Ajouter bouteille')
@section('content')

@isset($cellier_actif)
<a href="{{ route('cellier.show', ['cellier' => $cellier_actif]) }}" class="retour"> <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512"><path d="M352 115.4 331.3 96 160 256l171.3 160 20.7-19.3L201.5 256z" fill="#7e001e" class="fill-000000"></path></svg>Cellier</a>
@endisset

<section class="formBtl_section suggestion_section">

    <div class="formBtl_search-section over" x-data="{ ismodalopen: false }">
        <h1>Rechercher un Vin</h1>

        <div class="formBtl_search over">
            <x-autocomplete-search />
                       
            <div x-show="ismodalopen" x-init="$watch('ismodalopen', value => { if (value) { document.body.classList.add('pas-defilement'); } else { document.body.classList.remove('pas-defilement'); } })" class="modal-SAQ" x-transition>
                <h1>Ajouter à un cellier?</h1>
                <div>
                    <table>
                        <tr>
                            <th>Nom</th>
                            <td x-ref="nom" value="{{old('nom')}}"></td>
                        </tr>
                        <tr>
                            <th>Prix</th>
                            <td x-ref="prix" value="{{old('prix')}}"></td>
                        </tr>
                        <tr>
                            <th>Pays</th>
                            <td x-ref="pays" value="{{old('pays')}}"></td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td x-ref="type" value="{{old('type')}}"></td>
                        </tr>
                        <tr>
                            <th>Détails</th>
                            <td x-ref="description" value="{{old('description')}}"></td>
                        </tr>
                        <tr>
                            <th>Format</th>
                            <td x-ref="format" value="{{old('format ')}}"></td>
                        </tr>
                    </table>
                </div>

                <form action="" enctype="multipart/form-data" method="post">
                @csrf
                    <input type="hidden" name="id" x-ref="id" value="{{old('id')}}">
                    <input type="hidden" name="code_saq" x-ref="code_saq" value="{{old('code_saq')}}">
                    <select name="cellier">
                        {{-- <option value="" disabled selected>Choisir un cellier</option> --}}
                        @foreach($celliers as $cellier)
                        <option value="{{$cellier->id}}" @if($cellier_actif == $cellier->id) selected @endif>{{$cellier->nom}}</option>
                        @endforeach
                    </select>
                    <span x-text="errors.recap" class="textError"></span>
                    <input type="number" name="qte" placeholder="Nombre de bouteilles" min="0" max="9999999999" value="{{old('qte')}}">

                    <div x-text="errors.quantite" class="textError"></div>

                    <div class="btnWrapper">
                        <button @click="ismodalopen = false; $dispatch('reset-query') " class="modal-button modal-button-cancel">Annuler</button>
                        <button class="modal-button modal-button-confirm">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h1>Ajouter une bouteille</h1>

     <div>
        @if($errors)
          <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
    </div>
    
    <form x-data="{
    ismodalopen: true,
    formValues: {cellier: {{$cellier_actif}}},
    errors: {},
    validateForm() {
        event.preventDefault();
        this.errors = {};

        const requiredFields = ['nom', 'prix', 'pays', 'type', 'format', 'cellier', 'quantite'];
        const missingFields = requiredFields.filter(field => !this.formValues[field]);

        if (missingFields.length > 0) {
            this.errors.recap = 'Remplir ce champ';
            this.errors.warning = 'Champs manquant(s)';
            return;
        }

        event.target.submit();
    },
    validateField(field) {
        const fieldErrors = {};
        let isValid = true;
        fieldErrors[field] = ``;

        if (!this.formValues[field]) {
            fieldErrors[field] = `Le champ ${field} est obligatoire.`;
            <!-- console.log(fieldErrors) -->
            console.log(!this.formValues[field])
            isValid = false;
        }

        if (field == 'prix'){
            console.log('prix')
            fieldErrors[field] = ``;
            if (!(/^\d+\s*\$?$/.test(prix.value))) {
                            fieldErrors[field] = `Entrez un prix valide`;
                            isValid = false;
                        }
        }

        if (field == 'format'){
            console.log('format')
            fieldErrors[field] = ``;
            if (!(/^\d+$/.test(format.value))) {
                            fieldErrors[field] = `Entrez la quantité (sans écrire ml)`;
                            isValid = false;
                        }
        }

        if (field == 'qte'){
            fieldErrors[field] = ``;
            if (!(/^\d+\s*\$?$/.test(qte.value))) {
                            fieldErrors[field] = `Entrez une quantité valide`;
                            isValid = false;
                        }
        }
        
        this.errors = {...this.errors, ...fieldErrors};
        console.log(this.errors)
        return isValid;
    },
}" @submit.prevent="validateForm()" action="" enctype="multipart/form-data" class="formBtl_form" method="post">
 
        @csrf
       
        <label for="file" class="formBtl_ajoutL">Télécharger une image <i><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="formBtl_ajoutF"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></i>
        </label>
        <input type="file" id="file" name="file" accept="image/*" value="{{old('file')}}" class="formBtl_file">
        
         <span x-text="errors.recap" class="textError"></span>
        <input x-ref="nom" id="nom" type="text" name="nom" placeholder="Nom" value="{{old('nom')}}" x-model="formValues.nom" @blur="validateField('nom')">
        <span x-text="errors.nom" class="textError"></span>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="prix" id="prix" type="text" name="prix" placeholder="Prix" value="{{old('prix')}}" x-model="formValues.prix" @blur="validateField('prix')" />
        <div x-text="errors.prix" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="pays" id="pays" type="text" name="pays" placeholder="Pays" value="{{old('pays')}}" x-model="formValues.pays" @blur="validateField('pays')" />
        <div x-text="errors.pays" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <select x-ref="type" name="type" x-model="formValues.type" @blur="validateField('type')">
            <option value="" disabled selected>Choisir un type</option>
            <option value="Vin blanc">Vin blanc</option>
            <option value="Vin rouge">Vin rouge</option>
            <option value="Vin rose">Vin rosé</option>
            <option value="Vin de tomate">Vin de tomate</option>
        </select>
        <div x-text="errors.type" class="textError"></div>

        <textarea x-ref="description" name="description" placeholder="Description">{{old('description')}}</textarea>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="format" type="number" id="format" name="format" step="0.01" min="0" value="{{old('format')}}" placeholder="Quantité (en ml)" x-model="formValues.format" @blur="validateField('format')">
        <div x-text="errors.format" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <select name="cellier" x-model="formValues.cellier" @blur="validateField('cellier')">
            {{-- <option value="" disabled>Choisir un cellier</option> --}}
            @foreach($celliers as $cellier)
            <option value="{{$cellier->id}}" @if($cellier_actif == $cellier->id) selected @endif>{{$cellier->nom}}</option>
            @endforeach
        </select>
        <div x-text="errors.cellier" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <input type="number" id="qte" name="qte" placeholder="Nombre de bouteilles" min="0" / value="{{old('quantite')}}" x-model="formValues.quantite" @blur="validateField('quantite')">
        <div x-text="errors.quantite" class="textError"></div>

        <div x-text="errors.warning" class="textError"></div>
        <input class="btn" type="submit" value="Ajouter">

    </form>

 
 
</section>   

<div>
    <x-modalQte></x-modalQte>
</div>
@endsection