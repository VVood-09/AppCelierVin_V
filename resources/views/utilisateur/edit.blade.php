@extends('layouts.app')
@section('title', 'Modifier Profil')
@section('content')
   

<div class="formBtl">
  <h1>Modification de votre compte</h1>

  <form class="formBtl_form"   method="post" action="">
    @csrf
    @method('put')
     
    <input name="nom" type="text" placeholder="Nom" value="{{$utilisateur->name}}">
    <input name="email" type="email" placeholder="Courriel" value="{{$utilisateur->email}}">
    <input class="btn"  type="submit" value="Modifier">
       
  </form>

  <?php
    $action = 'supprimer le compte';
    $route = route('utilisateur.delete', ['id' => $utilisateur->id]);
  ?>
</div>

<div>
  <x-modal_suppresion route="{{ $route }}" trigger-text="Supprimer le compte">
    Êtes-vous certain de vouloir {{  $action }} ?
  </x-modal_suppresion>
</div>


@endsection