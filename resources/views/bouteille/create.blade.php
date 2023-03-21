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
                        <button><img src="/assets/img/icon_PW2/search_icon.png" alt="search icon"></button>


                        <div x-show="ismodalopen">
                            <h1>Ajouter cette bouteille de la SAQ à un cellier?</h1>
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
                            <form action="">
                                <input type="hidden" name="id" value="{{old('id')}}">
                                    <select name="cellier">
                                        <option value="" disabled selected>Choisir un cellier</option>
                                        @foreach($celliers as $cellier)
                                        <option value="{{$cellier->id}}">{{$cellier->nom}}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="qte" placeholder="Nombre de bouteilles" min="0" / value="{{old('qte')}}">
                                <div class="btnWrapper">
                                    <button class="modal-button modal-button-confirm">Confirmer</button>
                                    <button @click="ismodalopen = false; $dispatch('reset-query') " class="modal-button modal-button-cancel">Annuler</button>
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

    <form x-data="{ ismodalopen: true }" action="" enctype="multipart/form-data" class="formBtl_form" method="post">
        @csrf
        <input x-ref="nom" type="text" name="nom" placeholder="Nom" value="{{old('nom')}}">

        <input x-ref="prix" type="text" name="prix" placeholder="Prix" value="{{old('prix')}}" />

        <input x-ref="pays" type="text" name="pays" placeholder="Pays" value="{{old('pays')}}" />

        <select x-ref="type" name="type">
            <option value="" disabled selected>Choisir un type</option>
            <option value="Vin blanc">Vin blanc</option>
            <option value="Vin rouge">Vin rouge</option>
            <option value="Vin rose">Vin rosé</option>
            <option value="Vin de tomate">Vin de tomate</option>
        </select>


        <label for="file">Télécharger une image :</label>
        <input type="file" id="file" name="file" accept="image/*" value="{{old('file')}}">



        <textarea x-ref="description" name="description" placeholder="Description">{{old('description')}}</textarea>

        <input x-ref="format" type="number" id="format" name="format" step="0.01" min="0" value="{{old('format')}}" placeholder="Quantité (en ml)">

        <select name="cellier">
            <option value="" disabled selected>Choisir un cellier</option>
            @foreach($celliers as $cellier)
            <option value="{{$cellier->id}}">{{$cellier->nom}}</option>
            @endforeach
        </select>

        <input type="number" name="qte" placeholder="Nombre de bouteilles" min="0" / value="{{old('qte')}}">

        <input class="btn" type="submit" value="Ajouter">

    </form>

</section>
@endsection