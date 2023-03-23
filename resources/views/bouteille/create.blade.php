@extends('layouts.app')
@section('title', 'Ajouter Bouteille')
@section('content')



<section class="formBtl_section suggestion_section">


    <div x-data="{ ismodalopen: false }">
        <h1>Rechercher un Vin</h1>
        <div class="">
            <!-- <div class="fixed inset-0 bg-gray-500 bg-opacity-75"> -->
            <div class="">
                <!-- <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-lg w-2/3 max-w-md"> -->
                <div class="p-4">

                    <div class="formBtl_search">
                        <x-autocomplete-search />
                        <!-- <button><img src="/assets/img/icon_PW2/search_icon.png" alt="search icon"></button> -->


                        <div x-show="ismodalopen" class="modal-SAQ" x-transition>
                            <h1>Ajouter à un cellier?</h1>
                            <div>
                                @if($errors)
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
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




                            <div class="flex justify-end p-4">


                            </div>

                            <form action="" enctype="multipart/form-data" method="post">
                            @csrf
                                <input type="hidden" name="id" x-ref="id" value="{{old('id')}}">
                                <input type="hidden" name="code_saq" x-ref="code_saq" value="{{old('code_saq')}}">
                                <select name="cellier">
                                    <option value="" disabled selected>Choisir un cellier</option>
                                    @foreach($celliers as $cellier)
                                    <option value="{{$cellier->id}}">{{$cellier->nom}}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="qte" placeholder="Nombre de bouteilles" min="0" / value="{{old('qte')}}">
                                <div class="btnWrapper">
                                    <button @click="ismodalopen = false; $dispatch('reset-query') " class="modal-button modal-button-cancel">Annuler</button>
                                    <button class="modal-button modal-button-confirm">Confirmer</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="formBtl_search">
        <x-autocomplete-search  />
        <button><img src="/assets/img/icon_PW2/search_icon.png" alt="search icon"></button>
    </div>
-->
    <h1>Ajouter une Bouteille</h1>

    <div>
        @if($errors)
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form x-data="{ ismodalopen: true,
        formValues: {},
    errors: {},
    validateForm() {
        event.preventDefault();


        this.errors = {};

        if (!this.formValues.nom && !this.formValues.prix && !this.formValues.pays&& !this.formValues.type && !this.formValues.format && !this.formValues.cellier && !this.formValues.quantite  ) {
            <!-- console.log(!this.formValues.nom && !this.formValues.prix && !this.formValues.pays&& !this.formValues.type && !this.formValues.format && !this.formValues.cellier && !this.formValues.quantite  ) -->
            
            this.errors.recap = 'Remplir ce champ';
            this.errors.warning = 'Champs manquant(s)';
            return;
        }


        event.target.submit();

    },
    validateNom() {
        this.nomErrors = {};
        let isValid = true;
        if (!this.formValues.nom) {
            this.errors.nom = 'Le champ Nom est obligatoire.';
            isValid = false;
        }
        return isValid;

    },
    validatePrix() {
        this.prixErrors = {};
        let isValid = true;
        if (!this.formValues.prix) {
            this.errors.prix = 'Le champ Prix est obligatoire.';
            isValid = false;
        }
        return isValid;
    },
    validatePays() {
        this.paysErrors = {};
        let isValid = true;
        if (!this.formValues.pays) {
            this.errors.pays = 'Le champ pays est obligatoire.';
            isValid = false;
        }
        return isValid;
    },
    validateType() {
        this.typeErrors = {};
        let isValid = true;
        if (!this.formValues.type) {
            this.errors.type = 'Le champ type est obligatoire.';
            isValid = false;
        }
        return isValid;
    },
    validateFormat() {
        this.formatErrors = {};
        let isValid = true;
        if (!this.formValues.format) {
            this.errors.format = 'Le champ format est obligatoire.';
            isValid = false;
        }
        return isValid;
    },
    validateCellier() {
    this.cellierErrors = {};
    let isValid = true;
    if (!this.formValues.cellier) {
        this.errors.cellier = 'Le champ cellier est obligatoire.';
        isValid = false;
    }
    return isValid;
},
    validateQuantite() {
        this.quantiteErrors = {};
        let isValid = true;
        if (!this.formValues.quantite) {
            this.errors.quantite = 'Le champ quantité est obligatoire.';
            isValid = false;
        }
        return isValid;
    },

    
}" @submit.prevent="validateForm()" action="" enctype="multipart/form-data" class="formBtl_form" method="post">
        <!-- }" action="" enctype="multipart/form-data" class="formBtl_form" method="post"> -->
        @csrf
        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="nom" type="text" name="nom" placeholder="Nom" value="{{old('nom')}}" x-model="formValues.nom" @blur="validateNom()">
        <span x-text="errors.nom" class="textError"></span>


        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="prix" type="text" name="prix" placeholder="Prix" value="{{old('prix')}}" x-model="formValues.prix" @blur="validatePrix()" />
        <div x-text="errors.prix" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="pays" type="text" name="pays" placeholder="Pays" value="{{old('pays')}}" x-model="formValues.pays" @blur="validatePays()" />
        <div x-text="errors.pays" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <select x-ref="type" name="type" x-model="formValues.type" @blur="validateType()">
            <option value="" disabled selected>Choisir un type</option>
            <option value="Vin blanc">Vin blanc</option>
            <option value="Vin rouge">Vin rouge</option>
            <option value="Vin rose">Vin rosé</option>
            <option value="Vin de tomate">Vin de tomate</option>
        </select>
        <div x-text="errors.type" class="textError"></div>


        <label for="file">Télécharger une image :</label>
        <input type="file" id="file" name="file" accept="image/*" value="{{old('file')}}">



        <textarea x-ref="description" name="description" placeholder="Description">{{old('description')}}</textarea>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="format" type="number" id="format" name="format" step="0.01" min="0" value="{{old('format')}}" placeholder="Quantité (en ml)" x-model="formValues.format" @blur="validateFormat()">

        <div x-text="errors.format" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <select name="cellier" x-model="formValues.cellier" @blur="validateCellier()">
            <option value="" disabled selected>Choisir un cellier</option>
            @foreach($celliers as $cellier)
            <option value="{{$cellier->id}}">{{$cellier->nom}}</option>
            @endforeach
        </select>
        <div x-text="errors.cellier" class="textError"></div>

        <span x-text="errors.recap" class="textError"></span>
        <input type="number" name="qte" placeholder="Nombre de bouteilles" min="0" / value="{{old('quantite')}}" x-model="formValues.quantite" @blur="validateQuantite()">
        <div x-text="errors.quantite" class="textError"></div>


        <div x-text="errors.warning" class="textError"></div>
        <input class="btn" type="submit" value="Ajouter">

    </form>
</section>
@endsection