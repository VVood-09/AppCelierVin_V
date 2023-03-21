@extends('layouts.app')
@section('title', 'Modification cellier')
@section('content')
   
    <form class="formBtl_form"  method="post" action="">
        @csrf
        @method('put')
        <h1>Modification du Cellier {{$cellier->nom}} </h1>
        <input type="text" name="nom" placeholder="Nom du cellier" value="{{$cellier->nom}}">
        <input class="btn"  type="submit" value="Modifier">
         

    </form>
    
         <?php
            $action = 'Supprimer ce cellier';
            ?>


      <x-modal trigger-text="Supprimer Cellier" >
        Etes-vous certain de vouloir {{ $action }} ?
      </x-modal>
   


@endsection