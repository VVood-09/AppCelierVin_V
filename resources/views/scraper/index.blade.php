@extends('layouts.admin')
@section('title', 'Admin')
@section('content')

<div class="scraper">
    <section>
        <h1>Récupération des vins de la SAQ.</h1>
        <p>Celà peu prendre plusieurs minutes, veuillez ne pas fermer la page.</p>
    </section>
    <article x-data="{actif: true, demarrer(){this.actif=false; scraper();}}">
        <template x-if="actif">
            <button class="btn" @click="demarrer()"">Démarrer</button>
        </template>
        <template x-if="!actif">
            <div class="scraper_info">
                <p>
                    <span>Récupération en cours : </span>
                    <span id="page">0</span>
                    <span>/</span>
                    <span id="total">0</span>
                </p>
                <div class="scraper_progres">
                    <div class="scraper_chargement"></div>
                </div>
                <div class="scraper_log_conteneur">
                    <div class="scraper_log">
                    </div>
                </div>
            </div>
        </template>
    </article>
</div>

@endsection