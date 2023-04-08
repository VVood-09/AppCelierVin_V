@extends('layouts.admin')
@section('title', 'Statistiques')
@section('content')

<section class="stats">

    <h1>Statistiques du site</h1>

    <!--Injection des onglets-->
    <div x-data="slider()">
        <article x-ref="slider" data-interval="6000">
            
            <nav role="tablist">
                <ul>
                    <li><a href="#" role="tab">Membres</a></li>
                    <li><a href="#" role="tab">Vins</a></li>
                    <li><a href="#" role="tab">Commentaires</a></li>
                    <li><a href="#" role="tab">Notes</a></li>
                </ul>
            </nav>
            
            <!--Onglet 1-->
            <div class="grid">
                <div x-show="tab == 0" x-cloak>
                    <div class="grid_title">
                        <h4 >Statistiques sur les membres</h4>
                    </div>
   
                    <div class="grid_stat">
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de membres total</p>
                            <p class="grid_carte-info">{{$stats->nbUtilisateurs}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de membres inscrits depuis moins d'un mois</p>
                            <p class="grid_carte-info">{{$stats->utilisateursUnMois}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de membres inscrits depuis moins de 6 mois</p>
                            <p class="grid_carte-info">{{$stats->utilisateursSixMois}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de celliers en moyenne  par membre</p>
                            <p class="grid_carte-info">{{$stats->celliersUtilisateurs}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de bouteilles en moyenne par membre</p>
                            <p class="grid_carte-info">{{$stats->bouteillesUtilisateurs}}</p>
                        </div>
                    </div>
                </div>
                <!--Onglet 2-->
                <div x-show="tab == 1" x-cloak>
                     <div class="grid_title">
                         <h4>Statistiques sur les Vins</h4>
                     </div>     

                     <div class="grid_stat">
                        <div class="grid_stat-btlGlobal">
                            <div  class="grid_carte">
                                <p class="grid_carte-label">Nombre de bouteilles dans la base de données</p>
                                <p class="grid_carte-info">{{$stats->nbBouteilles}}</p>
                            </div>
                            <div  class="grid_carte">
                                <p class="grid_carte-label">Nombre de bouteilles enregistrées dans un cellier</p>

                                <p class="grid_carte-info">{{$stats->nbListeB}}</p>
                            </div>
                        </div>    
                        @foreach($pourcentage as $pourcentage)
                        <div class="grid_carte">
                            <p class="grid_carte-info">{{$pourcentage->type}}</p>
                            <p class="grid_carte-label">Nombre d'entrée de bouteille</p>
                            <p class="grid_carte-info">{{$pourcentage->count}}</p>
                            <p class="grid_carte-label">Quantités de bouteilles total enregistrées</p>
                            <p class="grid_carte-info">{{$pourcentage->qte_somme}}</p>
                            <p class="grid_carte-label">Pourcentage des bouteilles enregistrées dans les celliers des utilisateurs</p>
                            <p class="grid_carte-info">{{$pourcentage->pourcentage}}% </p>
                        </div>
                         @endforeach
                     </div>
                </div>
                <!--Onglet 3-->
                <div x-show="tab == 2" x-cloak>
                    <div class="grid_title">
                        <h4>Statistiques sur les Commentaires</h4>
                    </div>

                     <div class="grid_stat">
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de commentaires laissés au total</p>
                            <p class="grid_carte-info">{{$stats->nbCommentaires}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de commentaires laissés en moyenne par utilisateur</p>
                            <p class="grid_carte-info">{{$stats->commentairesUtilisateurs}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Le vin ayant le plus de commentaire</p>
                            <p class="grid_carte-vinComment">{{$bouteilleComment->nom}}</p>
                            @if($bouteilleComment->total == 1)
                            <p>{{$bouteilleComment->total}} commentaire</p>
                            @else
                            <p>{{$bouteilleComment->total}} commentaires</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!--Onglet 4-->
                <div x-show="tab == 3" x-cloak>
                    <div class="grid_title">
                        <h4>Statistiques sur les notes d'appréciation</h4>
                    </div>

                    <div class="grid_stat">
                        <div class="grid_stat-btlGlobal">
                            <div  class="grid_carte">
                                <p class="grid_carte-label">Nombre de notes laissées au total</p>
                                <p class="grid_carte-info">{{$stats->nbNotes}}</p>
                            </div>
                            <div  class="grid_carte">
                                <p class="grid_carte-label">Nombre de notes laissées en moyenne par utilisateur</p>
                                <p class="grid_carte-info">{{$stats->notesUtilisateurs}}</p>
                            </div>
                        </div>    
                        <div class="grid_carte">
                            <div>
                                <p class="grid_carte-label">Top 5 des vins ayant la note moyenne la plus élevée</p>
                                @if(count($topBouteilles) < 5)
                                    <small>Il n'y a que {{count($topBouteilles)}} bouteilles ayant des notes pour le moment</small>
                                @endif
                            </div>
                            @forEach($topBouteilles as $topBouteille)
                            <div class="grid_top5">
                                <div class="grid_top5-note">
                                    <p class="grid_carte-average">{{$topBouteille->average}} /5</p>
                                    @if($topBouteille->total == 1)
                                        <p class="grid_top5-noteCount">{{$topBouteille->total}} note</p>
                                    @else
                                        <p class="grid_top5-noteCount">{{$topBouteille->total}} notes</p>
                                    @endif
                                </div>
                                <p class="grid_top5-nom">{{$topBouteille->nom}}</p>
                            </div>
                            @endforeach
                        </div>  
                    </div>
                </div>
            </div>
        </article>
    </div>   
</section>
@endsection
        
<!--Script pour la gestion des onglets-->

<!-- https://github.com/RWDevelopment/alpine_js_slider/blob/main/index.html-->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slider', () => ({
                // set initial tab
                tab: 0,
                // slider tabs
                tabs: [...document.querySelectorAll('nav[role=tablist] a[role=tab]')],
            
                init() {
                    // initialize main function
                    this.changeSlide()
                },
            
                // main function
                changeSlide() {
                    let timeInterval = this.$refs.slider.dataset.interval;
                    this.tabs[this.tab].setAttribute('class', 'active')
                    
                    // slider tabs click event 
                    this.tabs.forEach( (tab)=> {
                        tab.addEventListener('click', (e)=> {
                            e.preventDefault()
                            this.tab = this.tabs.indexOf(e.target)
                            this.tabs.forEach( (tab)=> {
                                (this.tab == this.tabs.indexOf(tab)) ?  tab.setAttribute('class', 'active') : tab.removeAttribute('class') 
                            }) 
                        })
                    })
                }
            }))
        })
    </script>
    
