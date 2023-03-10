@extends('layouts.app')
@section('title', 'Ajouter cellier')
@section('content')


<section class="formCellier">
  <h1>Creer un Nouveau Cellier</h1>
    
     <form  action="" method="post">


              @csrf
              <div >
                <div >
                
                  <input placeholder="Nom du Cellier" type="text" id="nom" name="nom" class="form-control" value="{{old('nom')}}">
                </div>

              
              </div>

              <div >
                <input type="submit" name="" id="" value="Ajouter" class="btn ">
                <a href="{{ route ('dashboard')}}" class="btn-reverse ">Annuler</a>

              </div>

            </form>

</section>

 @endsection