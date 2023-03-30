@extends('layouts.admin')
@section('title', 'Admin')
@section('content')

    <table>
        @if(count($utilisateurs) > 0)
        <tr>
            <th>Nom</th>
            <th>Courriel</th>
            <th>Droit</th>
        </tr>
        @endif
        @forelse ($utilisateurs as $membre)
        <tr>
            <td>{{$membre->name}} @if(Auth::user()->id == $membre->id) (moi) @endif</td>
            <td>{{$membre->email}}</td>
            <td>{{$membre->permissionUtilisateur->permission}}</td>
            <td><a href="{{ route('admin.membre.show', [$membre->id]) }}" class="modifier">Modifier</a></td>
            <td>
                @if(Auth::user()->id !== $membre->id)
       
                <?php
                    $action = 'supprimer ce membre';
                    $route = route('admin.membre.delete', [$membre->id]);
                ?>

                <div>
                <x-modal_suppresion route="{{ $route }}" trigger-text="Supprimer">
                    Êtes-vous certain de vouloir {{  $action }} ?
                </x-modal_suppresion>
                </div>  
                @endif
            </td>
        </tr>
        @empty
        <h2>Aucun membres dans la base de donnée.</h2>
        @endforelse
    </table>
@endsection