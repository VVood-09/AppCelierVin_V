@extends('layouts.app')
@section('title', 'Modifier cellier')
@section('content')
   
<div class="formBtl">
  <h1>Modification du cellier {{$cellier->nom}} </h1>
  
  <form class="formBtl_form"  method="post" action="">
    @csrf
    @method('put')
    <input type="text" name="nom" placeholder="Nom du cellier" value="{{$cellier->nom}}">
    <input class="btn"  type="submit" value="Modifier">
    
    
  </form>
  
  @if($celliersTotal > 1)
    <?php
      $action = 'supprimer ce cellier';
      $route = route('cellier.delete', ['cellier' => $cellier->id]);
              ?>


    <x-modal_suppresion  route="{{ $route }}" trigger-text="Supprimer ce cellier" >
      Êtes-vous certain de vouloir {{ $action }} ?
    </x-modal_suppresion>
  @endif

</div>
  

@endsection