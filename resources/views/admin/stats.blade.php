@extends('layouts.admin')
@section('title', 'Statistiques')
@section('content')

<section class="stats">

    <h1>Statistiques du site</h1>
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
                            <p class="grid_carte-label">Nombre de membre inscrit depuis moins d'un mois</p>
                            <p class="grid_carte-info">{{$stats->utilisateursUnMois}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de membre inscrit depuis moins de 6 mois</p>
                            <p class="grid_carte-info">{{$stats->utilisateursSixMois}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de celliers en moyenne  par membre</p>
                            <p class="grid_carte-info">{{$stats->celliersUtilisateurs}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de bouteille en moyenne par membre</p>
                            <p class="grid_carte-info">{{$stats->bouteillesUtilisateurs}}</p>
                        </div>
                    </div>

                </div>
                <div x-show="tab == 1" x-cloak>
                     <div class="grid_title">
                         <h4>Statistiques sur les Vins</h4>
                     </div>     
                     <div class="grid_stat">

                       
                        <div class="grid_stat-btlGlobal">
                            <div  class="grid_carte">
                                <p class="grid_carte-label">Nombre de bouteille enregistrer dans la base de donnée</p>
                                <p class="grid_carte-info">{{$stats->nbBouteilles}}</p>
                            </div>
                            <div  class="grid_carte">
                                <p class="grid_carte-label">Nombre de bouteilles différentes enregistrées dans les celliers</p>
                                <p class="grid_carte-info">{{$stats->nbListeB}}</p>
                            </div>
                        </div>    
                        @foreach($pourcentage as $pourcentage)
                        <div class="grid_carte">
                            <p class="grid_carte-info">{{$pourcentage->type}}</p>
                            <p class="grid_carte-label">Nombre d'entrée de bouteille</p>
                            <p class="grid_carte-info">{{$pourcentage->count}}</p>
                            <p class="grid_carte-label">Quantités de bouteilles total enregistrées</p>
                            <p class="grid_carte-info">{{$pourcentage->qte_some}}</p>
                            <p class="grid_carte-label">Pourcentage des bouteilles enregistrées dans les celliers des utilisateurs</p>
                            <p class="grid_carte-info">{{$pourcentage->pourcentage}}% </p>

                        </div>
                         @endforeach
                     </div>
                </div>

                <div x-show="tab == 2" x-cloak>
                    <div class="grid_title">
                        <h4>Statistiques sur les Commentaires</h4>
                    </div>

                     <div class="grid_stat">
                        
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de commentaires laissé au total</p>
                            <p class="grid_carte-info">{{$stats->nbCommentaires}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Nombre de commentaires laissé en moyenne par utilisateur</p>
                            <p class="grid_carte-info">{{$stats->commentairesUtilisateurs}}</p>
                        </div>
                        <div class="grid_carte">
                            <p class="grid_carte-label">Le vin ayant le plus de commentaire</p>
                            <p class="grid_carte-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil voluptatibus pariatur hic, labore sequi magnam sunt maxime, voluptas in, fugiat sit quasi repellat. Sapiente est, accusantium earum perferendis aliquam ab.</p>
                        </div>
                    </div>
                </div>

                    <div x-show="tab == 3" x-cloak>
                        <div class="grid_title">
                             <h4>Statistiques sur les notes d'appréciation</h4>
                        </div>
                        <div class="grid_stat">
                            <div class="grid_carte">
                                <p class="grid_carte-label">Nombre de notes laissée au total</p>
                                <p class="grid_carte-info">{{$stats->nbNotes}}</p>
                            </div>
                            <div class="grid_carte">
                                <p class="grid_carte-label">Nombre de notes laissé en moyenne par utilisateur</p>
                                <p class="grid_carte-info">{{$stats->notesUtilisateurs}}</p>
                            </div>
                            <div class="grid_carte">
                                 <p class="grid_carte-label">Le vin (ou top 5) ayant la note moyenne la plus elever</p>
                                 <p class="grid_carte-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, quos aut neque recusandae aperiam veniam maiores, nam eligendi id illum, ipsa et dicta porro numquam hic nulla voluptas similique laborum.</p>
                            </div>
                           
                        </div>
                    </div>
            </div>
            </article>
        </div>
        
    </section>
        @endsection
        
        
        
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
                    
                    // set interval to change slide
                    let startInterval = () => {
                        this.tab = (this.tab < this.tabs.length - 1)? this.tab + 1 : 0;
                        this.tabs.forEach( (tab)=> {
                            (this.tab == this.tabs.indexOf(tab)) ?  tab.setAttribute('class', 'active') : tab.removeAttribute('class') 
                        })
                    }
                    
                    // start interval to change slide
                    // let slideInterval = setInterval(startInterval, timeInterval);
                    
                    // mouse over slider stops slide
                    this.$refs.slider.onmouseover = () => {
                        if (slideInterval) { 
                            clearInterval(slideInterval)
                            slideInterval = null;
                        }
                    }
                    
                    // mouse out slider starts again slide
                    this.$refs.slider.onmouseout = () => {
                        if (slideInterval === null) { 
                            slideInterval = setInterval(startInterval, timeInterval);
                        }
                    }
                    
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
    
<!-- https://github.com/RWDevelopment/alpine_js_slider/blob/main/index.html-->