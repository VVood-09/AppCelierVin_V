
@extends('layouts.app')
@section('title', 'Show cellier')
@section('content')
<!--<div class="liste-btl_head">
        <img src="{{asset('img/icon_PW2/black_profil_icon.png')}}" alt="profil_icon">
        <h3>John Canary</h3>
</div>  -->

<div class="liste-btl_body">
    <div class="liste-btl_title">
         <h1>Cellier : {{$cellier->nom}}</h1> 
        <!-- <a href="#"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a> Edit cellier name  !!--> 
    </div>

    <div class="liste-btl_liste">

@forelse($bouteilles as $bouteille)
        <div class="liste-btl_carte">
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
         
            <div class="liste-btl_info">
                <div class="liste-btl_info_header">
                    <div>
                        <p>{{$bouteille->pays}}</p>
                    </div>
                    <div>
                        <p>  {{$bouteille->type}}  </p>
                    </div>
                    <div>
                        <p>{{$bouteille->format}} </p>
                    </div>
                    
                </div>
               
                    <h1><a href="{{route('bouteille.show', [$cellier->id, $bouteille->id]) }}">{{$bouteille->nom}}</a></h1>
               
            </div>

            <div class="liste-btl_info_actions">
                <!--<p>4/5</p>-->
                <div>
                
                    <!--<button>-</button>-->
                    <input type="number" value="{{$bouteille->qte}}">
                    <!--<button>+</button>-->
                </div>
            </div>
        </div>
        @empty
        <div>Aucune bouteille dans le cellier</div>
  @endforelse



    </div>   
</div>
@endsection