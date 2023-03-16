@extends('layouts.app')
@section('title', 'Show bouteille')
@section('content')


    <article class="btl_carte">

         <div class="btl_carte-header">
             <p>4/5</p>
            
            <a href="#"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a><!-- Edit Btl !!-->
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
                <a href=""><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></a><!--minus bouteille -->
                <p>{{$qte->qte}}</p>
                <a href="#"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></a>   <!--ajout bouteille -->
            </div>

        
            <div class="btl_carte-description">
                <details >
                    <summary> <span data-css-icon="right outline"><i></i></span>Description</summary>
                    <div>
                        <p>{{$bouteille->description}}</p>
                    </div>
                </details>
            </div>


           <div class="btl_carte-commentaire">

            
<!-- Ajout de Commentaire !!-->


           <a href="#"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></a>
           

            <details>
                <summary>Commentaire</summary>

                <div class="carte_commentaire">

                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet odio aspernatur, illo facere nisi repellendus aliquid ratione reprehenderit fuga soluta voluptatem, vitae quae architecto molestias nesciunt magni voluptatum nostrum esse.</p>
               
                    <small>22/3/2001</small>
                </div>
            </details>


        </div>

        </div>
        
    </article>

@endsection