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
            <td>{{$membre->name}}</td>
            <td>{{$membre->email}}</td>
            <td>{{$membre->permissionUtilisateur->permission}}</td>
            <td><a href="#">Modifier</a></td>
            <td><a href="#">Supprimer</a></td>
        </tr>
        @empty
        <h2>Aucun membres dans la base de donnée.</h2>
        @endforelse
    </table>

@endsection