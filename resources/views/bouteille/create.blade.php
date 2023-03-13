@extends('layouts.app')
@section('title', 'Ajouter Bouteille')
@section('content')

<section class="formBtl_section">

    <h1>Rechercher un Vin</h1>

    <div class="formBtl_search">
        <x-autocomplete-search />
        <button><img src="/assets/img/icon_PW2/search_icon.png" alt="search icon"></button>
    </div>

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

    <form action="" enctype="multipart/form-data" class="formBtl_form" method="post">
        @csrf
        <input type="text" name="nom" placeholder="Nom" value="{{old('nom')}}">

        <input type="text" name="prix"  placeholder="Prix" value="{{old('prix')}}"/>

        <input type="text" name="pays" placeholder="Pays" value="{{old('pays')}}"/>

         <select name="type" >
            <option value="" disabled selected>Choisir un type</option>
            <option value="blanc">Blanc</option>
            <option value="rouge">Rouge</option>
            <option value="rose">Rosé</option>
        </select>

       <!-- <label for="file">Télécharger une image :</label>
        <input type="file" id="file" name="file" accept="image/*" value="{{old('file')}}"> 
-->
 

        <textarea name="description" placeholder="Description" >{{old('description')}}</textarea>

        <input type="number" id="format" name="format" step="0.01" min="0" value="{{old('format')}}" placeholder="Quantité (en ml)">

        <select name="cellier" >
            <option value="" disabled selected>Choisir un cellier</option>
            @foreach($celliers as $cellier)
            <option value="{{$cellier->id}}">{{$cellier->nom}}</option>
            @endforeach
        </select>

        <input type="number" name="qte"  placeholder="Nombre de bouteilles" min="0"/ value="{{old('qte')}}">

        <input class="btn" type="submit" value="Ajouter">

    </form>

</section>
@endsection
