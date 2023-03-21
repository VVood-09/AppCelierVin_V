@extends('layouts.app')
@section('title', 'Modification Cellier')
@section('content')
   
<div class="formBtl">
  <h1>Modification du Cellier {{$cellier->nom}} </h1>
  
  <form class="formBtl_form"  method="post" action="">
    @csrf
    @method('put')
    <input type="text" name="nom" placeholder="Nom du cellier" value="{{$cellier->nom}}">
    <input class="btn"  type="submit" value="Modifier">
    
    
  </form>
  
  <?php
    $action = 'Supprimer ce cellier';
            ?>


  <x-modal trigger-text="Supprimer ce cellier" >
    Etes-vous certain de vouloir {{ $action }} ?
  </x-modal>
</div>
  

@endsection