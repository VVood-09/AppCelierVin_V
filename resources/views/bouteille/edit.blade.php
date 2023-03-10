@extends('layouts.app')
@section('title', 'Modifier Bouteille')
@section('content')

<section class="formBtl_section">


    <h1>Modifier une Bouteille</h1>

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
        <input type="text" name="nom" placeholder="Nom" value="{{$bouteille.nom}}">

        <input type="text" name="prix"  placeholder="Prix" value="{{$bouteille.prix}}"/>

        <input type="text" name="pays" placeholder="Pays" value="{{$bouteille.pays}}"/>

         <select name="type" >
            <option value="" disabled selected>Choisir un type</option>
            <option value="blanc">Blanc</option>
            <option value="rouge">Rouge</option>
            <option value="rose">Rosé</option>
        </select>

        <label for="file">Télécharger une image :</label>
        <input type="file" id="file" name="file" accept="image/*" > 

        <!--<select name="provenance"  >
            <option value="" disabled selected>Choisir un pays</option>
            @foreach($provenances as $provenance)
            <option value="{{$provenance->id}}">{{$provenance->pays}}</option>
            @endforeach
        </select>-->

        <textarea name="description" placeholder="Description" >{{$bouteille.description}}</textarea>

        <label for="format">Quantité (en ml):</label>
        <input type="number" id="format" name="format" step="0.01" min="0" value="{{$bouteille.format}}">



        <select name="cellier" >
            <option value="" disabled selected>Choisir un cellier</option>
            @foreach($celliers as $cellier)
            <option value="{{$cellier->id}}">{{$cellier->nom}}</option>
            @endforeach
        </select>

        <input type="number" name="qte"  placeholder="Qte" min="0"/ value="{{$bouteille.qte}}">

        <input type="submit" value="Ajouter">

    </form>

</section>
@endsection
