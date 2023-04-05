@extends('layouts.app')
@section('title', 'Ajouter Bouteille')
@section('content')
<script>
window.addEventListener('DOMContentLoaded', () => {
  const qteInput = document.querySelector('input[name="qte"]');
  const confirmerButton = document.querySelector('.modal-button-confirm');
  const spanErrorModal = document.querySelector('.spanErrorModal');
  const errorMessage = document.createElement('span');
  const cellierSelect = document.querySelector('#selectCellier');

  errorMessage.style.color = 'red';
  errorMessage.style.fontSize = '0.8em';
  
  confirmerButton.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent the default form submission behavior
    
    if ((qteInput.value > 0) && (cellierSelect.value)) {

        errorMessage.textContent = ''; // Clear the error message if the input is valid
        event.target.form.submit();
    } else {
        cellierSelect.value = cellierSelect.firstElementChild.value
        spanErrorModal.textContent = 'Veuillez entrer un nombre entier et choisir un cellier.'; // Show the error message if the input is invalid
    }
  });

  const btnWrapper = document.querySelector('.btnWrapper');
  btnWrapper.insertBefore(errorMessage, confirmerButton);
});
</script>




<section class="formBtl_section suggestion_section">

    <div x-data="{ ismodalopen: false }" class="formBtl_section-recherche">
        <h1>Rechercher un Vin</h1>
        <div class="formBtl_search">
            <x-autocomplete-search />
                       
            <div x-show="ismodalopen" class="modal-SAQ" x-transition  x-init="$watch('ismodalopen', value => { if (value) { document.body.classList.add('pas-defilement'); } else { document.body.classList.remove('pas-defilement'); } })">
                <h1>Ajouter à un cellier?</h1>
                <div>
                    <table>
                        <tr>
                            <th>Nom</th>
                            <td x-ref="nom"></td>
                        </tr>
                        <tr>
                            <th>Prix</th>
                            <td x-ref="prix"></td>
                        </tr>
                        <tr>
                            <th>Pays</th>
                            <td x-ref="pays"></td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td x-ref="type"></td>
                        </tr>
                        <tr>
                            <th>Détails</th>
                            <td x-ref="description"></td>
                        </tr>
                        <tr>
                            <th>Format</th>
                            <td x-ref="format"></td>
                        </tr>
                    </table>
                </div>

                <form action="" enctype="multipart/form-data" method="post">
                @csrf
                    <input type="hidden" name="id" x-ref="id">
                    <input type="hidden" name="code_saq" x-ref="code_saq">
                    <select name="cellier" id="selectCellier">
                        @foreach($celliers as $cellier)
                        <option value="{{$cellier->id}}" @if($cellier_actif == $cellier->id) selected @endif>{{$cellier->nom}}</option>
                        @endforeach
                    </select>
                    <input type="number" name="qte" placeholder="Nombre de bouteilles" min="0" / value="1" required aria-label="Nombre">
                    <div class="btnWrapper">
                        <button type="button" @click="ismodalopen = false; $dispatch('reset-query') " class="modal-button modal-button-cancel">Annuler</button>
                        <button class="modal-button modal-button-confirm">Confirmer</button>
                    </div>
                    <span class="spanErrorModal"></span>
                </form>
            </div>
        </div>
    </div>

    <h1>Ajouter une Bouteille</h1>

    <form x-data="{
    ismodalopen: true,
    formValues: {cellier: `{{$cellier_actif}}`},
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

        if (!this.formValues[field]) {
            fieldErrors[field] = `Le champ ${field} est obligatoire.`;
            isValid = false;
        }
        
        this.errors = {...this.errors, ...fieldErrors};
        return isValid;
    },
}" @submit.prevent="validateForm()" action="" enctype="multipart/form-data" class="formBtl_form" method="post">
 
        @csrf
        <span x-text="errors.recap" class="textError"></span>
        <label for="file" class="formBtl_ajoutL">Télécharger une image <i><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="formBtl_ajoutF"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></i>
        </label>
        <input type="file" id="file" name="file" accept="image/*" value="{{old('file')}}" class="formBtl_file" aria-label="Image">

        <input x-ref="nom" type="text" name="nom" placeholder="Nom" value="{{old('nom')}}" x-model="formValues.nom" @blur="validateField('nom')" aria-label="nom">
        <span x-text="errors.nom" class="textError"></span>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="prix" type="text" name="prix" placeholder="Prix" value="{{old('prix')}}" x-model="formValues.prix" @blur="validateField('prix')" aria-label="prix"/>
        <div x-text="errors.prix" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="pays" type="text" name="pays" placeholder="Pays" value="{{old('pays')}}" x-model="formValues.pays" @blur="validateField('pays')" aria-label="pays"/>
        <div x-text="errors.pays" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <select x-ref="type" name="type" x-model="formValues.type" @blur="validateField('type')" aria-label="Type">
            <option value="" disabled selected>Choisir un type</option>
            <option value="Vin blanc">Vin blanc</option>
            <option value="Vin rouge">Vin rouge</option>
            <option value="Vin rose">Vin rosé</option>
            <option value="Vin de tomate">Vin de tomate</option>
        </select>
        <div x-text="errors.type" class="textError"></div>

        <textarea x-ref="description" name="description" placeholder="Description" aria-label="Description">{{old('description')}}</textarea>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="format" type="number" id="format" name="format" step="0.01" min="0" value="{{old('format')}}" placeholder="Quantité (en ml)" x-model="formValues.format" @blur="validateField('format')" aria-label="Format">
        <div x-text="errors.format" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <select name="cellier" x-model="formValues.cellier" @blur="validateField('cellier')" aria-label="cellier">
            @foreach($celliers as $cellier)
            <option value="{{$cellier->id}}" @if($cellier_actif == $cellier->id) selected @endif>{{$cellier->nom}}</option>
            @endforeach
        </select>
        <div x-text="errors.cellier" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <input aria-label="Nombre de bouteilles" type="number" name="qte" placeholder="Nombre de bouteilles" min="0" / value="{{old('quantite')}}" x-model="formValues.quantite" @blur="validateField('quantite')">
        <div x-text="errors.quantite" class="textError"></div>

        <div x-text="errors.warning" class="textError"></div>
        <input class="btn" type="submit" value="Ajouter">

    </form>

</section>

<div>
    <x-modalQte></x-modalQte>
</div>
@endsection