@extends('layouts.admin')
@section('title', 'Admin')
@section('content')

<h1>Récupération des vins de la SAQ.</h1>
<p>Celà peu prendre plusieurs minutes, veuillez ne pas fermer la page.</p>
<section x-data="{actif: true, demarrer(){this.actif=false; scraper(this.page);}}">
    <template x-if="actif">
        <button @click="demarrer()"">Démarrer</button>
    </template>
    <template x-if="!actif">
        <article>
            <h1>Allo</h1>
            <p>Test de récupération x-data</p>
            <p id="page"></p>
        </article>
    </template>
</section>

@endsection