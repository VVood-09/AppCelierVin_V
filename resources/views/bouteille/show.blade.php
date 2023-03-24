@extends('layouts.app')
@section('title', 'Show bouteille')
@section('content')

    <a href="{{ route('cellier.show', ['cellier' => $cellier->id]) }}" class="retour"> <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512"><path d="M352 115.4 331.3 96 160 256l171.3 160 20.7-19.3L201.5 256z" fill="#7e001e" class="fill-000000"></path></svg>Cellier</a>
    <article class="btl_carte">
        
        <div class="btl_carte-header">   
            <!-- Composante Note.php -->
            <x-note :note="$note"/>         
            @if(!$bouteille->code_saq)
            <a href="{{route('bouteille.edit',[$cellier->id, $bouteille->id])}}"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a>
            @endIf
        </div>

        <div class="btl_carte-body">

            <div class="liste-btl_img">
                @isset($bouteille->image)
                    @isset($bouteille->code_saq)
                        <img src="{{$bouteille->image}}" alt="{{$bouteille->nom}}" class="saq">
                    @else
                        <img src="{{asset('storage/uploads/'.$bouteille->image)}}" alt="{{$bouteille->nom}}" > 
                    @endisset
                @else
                    <img src="{{asset('assets/img/icon_PW2/btl-alt_maison.svg')}}" alt="{{$bouteille->nom}}" class="liste-btl_img_alt">
                @endisset
            </div>

            <div class="btl_carte-saq_lien">
                @if($bouteille->url_saq != null)
                    <a href="{{$bouteille->url_saq}}" target="blank"><img src="/assets/img/icon_PW2/SAQ_Logo.svg.png" alt="SAQ logo"></a>
                @endif
            </div>

            <h1>{{$bouteille->nom}}</h1>

            <div class="btl_carte-bullet_info">
                <div>
                    <span class="btl_carte-espaceur"></span>
                    <small>{{$bouteille->pays}}</small>
                </div>
                <div>
                    <small>{{$bouteille->type}}</small>
                    <span class="btl_carte-espaceur"></span>
                </div>
            </div>

            <div class="btl_carte-bullet_info">
                <div>
                     <span class="btl_carte-espaceur-large"></span>
                     <p>{{$bouteille->prix}}$</p>
                </div>
                <div>
                     <p>{{$bouteille->format}}</p>
                     <span class="btl_carte-espaceur-large"></span>
                </div>
            </div>

            <div  class="btl_carte-quantite">   
                <x-quantite :bouteille="$bouteille" :cellier="$cellier"/>             
            </div>

            <div class="btl_carte-description">
                <details>
                    <summary><span data-css-icon="right outline"><i></i></span>Description</summary>
                    <div>
                        <p>{{$bouteille->description}}</p>
                    </div>
                </details>
            </div>


           <div class="btl_carte-commentaire">            
                <!-- Ajout de Commentaire !!-->
                <?php
                    $route = route('commentaire.store', ['cellier' => $cellier->id,'bouteille' => $bouteille->id]);
                ?>

                <x-modal_commentaire  route="{{ $route }}"  />
                            
                <details class="comment">
                    <summary> @if(count($comments)>1)Commentaires @else Commentaire @endif</summary>
                  
                    @foreach($comments as $comment)
                    <div class="carte_commentaire">
                        <p>{{$comment->commentaire}}</p>               
                        <small>{{$comment->created_at_format}}</small>
                    </div>
                
                    @endforeach
                </details>
            </div>

        </div>
    </article>

    <div>
        <x-notification ></x-notification>
    </div>

@endsection