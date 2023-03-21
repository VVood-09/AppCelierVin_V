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
        @method('put')

        <input type="text" name="nom" placeholder="Nom" value="{{$bouteille->nom}}">

        <input type="text" name="prix"  placeholder="Prix" value="{{$bouteille->prix}}"/>

        <input type="text" name="pays" placeholder="Pays" value="{{$bouteille->pays}}"/>
  

        <select name="type" >
            <option value="Vin blanc" @if($bouteille->type == "Vin blanc") selected @endif>Vin blanc</option>
            <option value="Vin rouge" @if($bouteille->type == "Vin rouge") selected @endif>Vin rouge</option>
            <option value="Vin rosé"@if($bouteille->type == "Vin rosé") selected @endif>Vin rosé</option>
            <option value="Vin de tomate" @if($bouteille->type == "Vin de tomate") selected @endif>Vin de tomate</option>
        </select>

        <label for="file">Télécharger une image :</label>
        <input type="file" id="file" name="file" accept="image/*" > 


        <textarea name="description" placeholder="Description" >{{$bouteille->description}}</textarea>

        <input type="text" id="format" name="format" step="0.01" min="0" value="{{$bouteille->format}}" placeholder="Quantité (en ml)">

        <input class="btn"type="submit" value="Modifier">
        <a href="#" class="btn-reverse">Suprimer</a>
      
    </form>


  


</section>
@endsection
