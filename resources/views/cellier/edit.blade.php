@extends('layouts.app')
@section('title', 'Modifier cellier')
@section('content')
   
<a href="{{ route('cellier.show', ['cellier' => $cellier->id]) }}" class="retour"> <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512"><path d="M352 115.4 331.3 96 160 256l171.3 160 20.7-19.3L201.5 256z" fill="#7e001e" class="fill-000000"></path></svg>Cellier</a>
  
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