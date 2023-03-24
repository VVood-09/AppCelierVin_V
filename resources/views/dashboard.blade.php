@extends('layouts.app')
@section('title', 'Celliers')
@section('content')



    <section class="liste_celliers">
        <div class="header">
            <h1>Mes Celliers</h1>
        </div>

        <div class="grid__celliers">
        @forelse($celliers as $cellier)
            <a href="{{ route('cellier.show', $cellier->id)}}" class="card__cellier"> <span>

                {{ $cellier->nom }}
            </span>
               </a>
        @empty
            <h3>Aucun cellier</h3>
        @endforelse
        
        </div>
    
        <!-- Button trigger modal -->
            <!--<button type="button" class="" style="width:35px;" @click="showModal = true">-->
                <a href="{{ route('cellier.create') }}" class="btn">Ajouter un cellier
                </a>
            <!--</button> -->

    </section>

                                    
    <!-- Modal -->
   <!-- <div class="" x-show="showModal" @click.away="showModal = false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout d'un cellier</h1>
                    <button type="button" class="" @click="showModal = false" aria-label="Fermer">X</button>
                </div>
                <form action="" method="post">
                     @csrf
                <div class="modal-body">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="" value="{{old('nom')}}">
                </div>
                <div class="modal-footer">
                    
                    <input type="submit" value="Créer" class="">
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!--/Modal -->

    <div>
        <x-notification ></x-notification>
    </div>
@endsection



