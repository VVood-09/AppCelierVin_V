

@extends('layouts.app')
@section('title', 'Show cellier')
@section('content')
<div class="liste-btl_head">
        <img src="{{asset('img/icon_PW2/black_profil_icon.png')}}" alt="profil_icon">
        <h3>John Canary</h3>
</div>  

<div class="liste-btl_body">
    <div class="liste-btl_title">
        <h1>{{$cellier->nom}}</h1>
        <a href="#"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a><!-- Edit cellier name  !!-->
    </div>

    <div class="liste-btl_liste">

@forelse($bouteilles as $bouteille)
        <div class="liste-btl_carte">
            <img src="" alt="">
         
            <div class="liste-btl_info">
                <div>
                  <small>{{$bouteille->pays}}</small> <small>-{{$bouteille->type}}-</small>
                  <!--<p>4/5</p>-->
                </div>
                <div>
                  <h1>{{$bouteille->nom}}</h1>
               
                </div>
                <div>
                    <button>-</button>
                    <p>{{$bouteille->qte}}</p>
                    <button>+</button>
                </div>
            </div>
        </div>
        @empty
        <div>Aucune bouteille dans le cellier</div>
  @endforelse



    </div>   
</div>
@endsection