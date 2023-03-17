@extends('layouts.app')
@section('title', 'Ajouter cellier')
@section('content')


<section class="formCellier">
  <h1>Créer un nouveau cellier</h1>
  <form  action="" method="post">
    @csrf
      <div class="formCellier_input">
        <input placeholder="Nom du Cellier" type="text" id="nom" name="nom" class="form-control" value="{{old('nom')}}" maxlength="8">
      </div>
      <div class="formCellier_btn">
          <input type="submit" name="" id="" value="Ajouter" class="btn ">
          <a href="{{ route ('dashboard')}}" class="btn-reverse ">Annuler</a>
      </div>
  </form>
</section>

 @endsection