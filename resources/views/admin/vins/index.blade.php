@extends('layouts.admin')
@section('title', 'Vins')
@section('content')

<section>
 
    <table>
        @if(count($vins) > 0)
        <tr class="top">
            <th>Nom</th>
            <th>Pays</th>
            <th>Prix</th>
            <th>Type</th>
            <th>Date de création</th>
            <th>Commentaires</th>
            <th>Note moyenne</th>
            <th>Celliers</th>
        </tr>
        @endif
        @forelse ($vins as $vin)
        <tr>
            <td>{{$vin->nom}}</td>
            <td>{{$vin->pays}}</td>
            <td>{{$vin->prix}}</td>
            <td>{{$vin->type}}</td>
            <td>{{$vin->created_at_format}}</td>
            <td>{{$vin->nbComments}}</td>
            <td>{{$vin->moyenne}}/5</td>
            <td>{{$vin->nbCelliers}}</td>
            
        </tr>
        @empty
        <h2>Aucun vin dans la base de donnée.</h2>
        @endforelse
    </table>
 
        {{ $vins->links('vendor.pagination.default') }}
 
</section>
@endsection