@extends('layouts.app')
@section('title', 'Show bouteille')
@section('content')
<div class="btl_head">
           <!--<div>
                <img src="assets/img/icon_PW2/black_profil_icon.png" alt="profil_icon">
                <div>
                    <h3>John Canary</h3>
                    <a href=""> <small>Cellier: {{$cellier->nom}}</small> </a>
                </div>
           </div>-->
           <h1>Cellier: {{$cellier->nom}}</h1>
       
            <div class="btl_head-quantite" >
                <h4>Quantité: {{$qte->qte}}</h4>
               
            </div>
      

    </div>  

    <article class="btl_carte">
        <div class="btl_carte-header">
            <div class="btl_carte-header_title">
                <h1>{{$bouteille->nom}}</h1>
                <!--<a href="#"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a>--><!-- Edit Btl !!-->
            </div>
            <div class="btl_carte-header_sub-title">
                <p>Type:  {{$bouteille->type}}</p>
                <p>Prix:  {{$bouteille->prix}} $</p>
                <p>Pays:  {{$bouteille->pays}} </p>
                <p>Format:  {{$bouteille->format}} ml</p>
                <p>Appréciation: 4/5</p>
            </div>
            <div>
                @if($bouteille->url_saq != null)
                <a href="{{$bouteille->url_saq}}">Voir sur le site de la SAQ</a>
                @endif
            </div>
        </div>
        <div class="btl_carte-body">
            <img src="" alt="">
        <details>
            <summary>Description</summary>
            <p>{{$bouteille->description}}</p>
        </details>
        <div class="btl_carte-commentaire">
            <details>
                <summary>Commentaire</summary>
                <div class="btl_carte-commentaire_carte">
                    <div>
                        <h3>John Canary</h3>
                        <small>2001</small>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet odio aspernatur, illo facere nisi repellendus aliquid ratione reprehenderit fuga soluta voluptatem, vitae quae architecto molestias nesciunt magni voluptatum nostrum esse.</p>
                </div>
            </details>
            <!--<a href="#"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a>--><!-- Ajout de Commentaire !!-->
        </div>

        </div>
        
    </article>

@endsection