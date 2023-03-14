@extends('layouts.app')
@section('title', 'Show bouteille')
@section('content')
<!-- <div class="btl_head">
            
        
                <div class="btl_head-quantite" >
               
            </div>
                <div>
                  
                </div>
    </div>   -->

    <article class="btl_carte">

         <a href="#"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a><!-- Edit Btl !!-->
        
         <div class="btl_carte-header">

            <div class="btl_carte-header_title">
                <h1>{{$bouteille->nom}}</h1>
                <h4>Quantité: {{$qte->qte}}</h4>
            </div>


            <div class="btl_carte-header_sub-title">
                 
                   <p>Appréciation: 4/5</p>
                   <p>Pays:  {{$bouteille->pays}} </p>
                   
                <p>Type:  {{$bouteille->type}}</p>
                <p>Prix:  {{$bouteille->prix}} $</p>
                
                <p>Format:  {{$bouteille->format}} ml</p>
             
                  <a href=""> <small>Cellier: {{$cellier->nom}}</small> </a>
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
            
           <a href="#"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></a><!-- Ajout de Commentaire !!-->
        </div>

        </div>
        
    </article>

@endsection