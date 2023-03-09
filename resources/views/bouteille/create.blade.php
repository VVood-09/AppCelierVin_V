@extends('layouts.app')
@section('title', 'Ajout bouteille')
@section('content')
<h1>Rechercher une biere</h1>

<input type="search" id="recherche_bouteille" name="q" >
<span></span>

<button>Rechercher</button>


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

<form action="" enctype="multipart/form-data" method="post">
     @csrf
    <input type="text" name="nom" placeholder="Nom" value="{{old('nom')}}">

    <input type="text" name="prix"  placeholder="Prix" value="{{old('prix')}}"/>

    <input type="text" name="pays" placeholder="Pays" value="{{old('pays')}}"/>

    <input type="text" name="type" placeholder="Type" value="{{old('type')}}"/>

    <label for="file">Télécharger une image :</label>
    <input type="file" id="file" name="file" accept="image/*" value="{{old('file')}}"> 

    <!--<select name="provenance"  >
        <option value="" disabled selected>Choisir un pays</option>
        @foreach($provenances as $provenance)
        <option value="{{$provenance->id}}">{{$provenance->pays}}</option>
        @endforeach
    </select>-->

    <textarea name="description" placeholder="Description" >{{old('description')}}</textarea>

    <label for="format">Quantité (en ml):</label>
    <input type="number" id="format" name="format" step="0.01" min="0" value="{{old('format')}}">



    <select name="cellier" >
        <option value="" disabled selected>Choisir un cellier</option>
        @foreach($celliers as $cellier)
        <option value="{{$cellier->id}}">{{$cellier->nom}}</option>
        @endforeach
    </select>

    <input type="number" name="qte"  placeholder="Qte" min="0"/ value="{{old('qte')}}">

    <input type="submit" value="Ajouter">

</form>
@endsection
