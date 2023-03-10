<h1>Récupération de la SAQ complet!</h1><br>
<h2>{{count($liste)}} bouteilles ajoutées.</h2>
@forelse($liste as $bouteille)
    <hr>
    <p>{{$bouteille['nom']}}</p>
    <p>{{$bouteille['code_saq']}}</p>
    {{-- <p>{{$bouteille->nom}}</p> --}}
    {{-- <p>{{$bouteille->code_saq}}</p> --}}
@empty

@endforelse