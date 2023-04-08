@extends('layouts.app')
@section('title', 'Celliers')
@section('content')

    <section class="liste_celliers">
        <div class="header">
            <h1>Mes celliers</h1>
        </div>

        <div class="grid__celliers">
        @foreach($celliers as $cellier)
            <a href="{{ route('cellier.show', $cellier->id)}}" class="card__cellier"> 
                <span>
                {{ $cellier->nom }}
                </span>
            </a>
        @endforeach
        </div>

        <a href="{{ route('cellier.create') }}" class="btn">Ajouter un cellier</a>
    </section>

<!-- Appel au composant de notification de retour d'action-->
    <div>
        <x-notification ></x-notification>
    </div>
@endsection



