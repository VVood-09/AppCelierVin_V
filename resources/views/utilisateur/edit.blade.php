@extends('layouts.app')
@section('title', 'Modification Profil')
@section('content')
   

<div class="formBtl">
  <h1>Modification de votre compte</h1>


    <!-- <span><svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512"><path d="M448 448s0-26.4-2.2-40.2c-1.8-10.9-16.9-25.3-81.1-48.9-63.2-23.2-59.3-11.9-59.3-54.6 0-27.7 14.1-11.6 23.1-64.2 3.5-20.7 6.3-6.9 13.9-40.1 4-17.4-2.7-18.7-1.9-27 .8-8.3 1.6-15.7 3.1-32.7 1.8-21-17.7-76.3-87.6-76.3-69.9 0-89.4 55.3-87.5 76.4 1.5 16.9 2.3 24.4 3.1 32.7.8 8.3-5.9 9.6-1.9 27 7.6 33.1 10.4 19.3 13.9 40.1 9 52.6 23.1 36.5 23.1 64.2 0 42.8 3.9 31.5-59.3 54.6-64.2 23.5-79.4 38-81.1 48.9C64 421.6 64 448 64 448h384z" fill="#181818" class="fill-000000"></path></svg></span> -->


  <form class="formBtl_form"   method="post" action="">
        @csrf
        @method('put')
         
        <input name="nom" type="text" placeholder="Nom" value="{{$utilisateur->name}}">
        <input name="email" type="email" placeholder="Courriel" value="{{$utilisateur->email}}">
        <input class="btn"  type="submit" value="Modifier">
       
    </form>

    
    <?php
    $action = 'Supprimer le compte';
    ?>
    <x-modal_suppresion trigger-text="Supprimer le compte" >
      Etes-vous certain de vouloir {{ $action }} ?
    </x-modal_suppresion>
            
</div>

@endsection