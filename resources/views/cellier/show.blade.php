
@extends('layouts.app')
@section('title', 'Cellier')
@section('content')

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{session('success')}}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
<div class="liste-btl_body">
    <div class="liste-btl_title">
         <h1>Cellier : {{$cellier->nom}}</h1> 
         <a href="{{ route('cellier.edit', $cellier->id)}}"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a> 
    </div>

    <div class="liste-btl_liste">

<!--@forelse($bouteilles as $bouteille)
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
                <!--<p>4/5</p>
                <div>
                
                    <!--<button>-</button>
                    <input type="number" value="{{$bouteille->qte}}">
                    <!--<button>+</button>
                </div>
            </div>
        </div>
        @empty
        <div>Aucune bouteille dans le cellier</div>
  @endforelse
-->

@forelse($bouteilles as $bouteille)
        <div class="liste-btl_carte">
           
            <div class="liste-btl_tete">
                <div class="liste-btl_tete_pays">
                    <svg enable-background="new 0 0 48 48" height="48px" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Expanded"><g><g><path d="M22.007,35c-9.374,0-17-7.626-17-17s7.626-17,17-17s17,7.626,17,17S31.381,35,22.007,35z M22.007,3     c-8.271,0-15,6.729-15,15s6.729,15,15,15s15-6.729,15-15S30.278,3,22.007,3z"/></g><g><path d="M22.007,39.99c-5.634,0-11.268-2.145-15.557-6.433l1.414-1.414c7.799,7.797,20.487,7.798,28.284,0     c7.798-7.798,7.798-20.487,0-28.285l1.414-1.414c8.578,8.578,8.578,22.535,0,31.113C33.274,37.845,27.641,39.99,22.007,39.99z"/></g><g><rect height="4.05" width="2" x="20.007" y="38.976"/></g><g><rect height="4.05" width="2" x="22.007" y="38.976"/></g><g><path d="M36.973,48H7.04l2.403-1.8c3.668-2.748,8.013-4.2,12.563-4.2s8.895,1.452,12.562,4.2L36.973,48z M13.547,46h16.92     c-2.617-1.315-5.49-2-8.46-2S16.163,44.685,13.547,46z"/></g><g><path d="M5.743,35.264c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l2.828-2.828     c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L6.45,34.971C6.255,35.166,5.999,35.264,5.743,35.264z"/></g><g><path d="M35.441,5.565c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l2.828-2.828     c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414l-2.828,2.828C35.953,5.468,35.697,5.565,35.441,5.565z"/></g></g></g></svg>
                    <p>{{$bouteille->pays}}</p>
                </div>                   
                <span class="liste-btl_info_etoile">
                    <svg baseProfile="tiny" version="1.2" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m9.362 9.158-5.268.584c-.19.023-.358.15-.421.343s0 .394.14.521c1.566 1.429 3.919 3.569 3.919 3.569-.002 0-.646 3.113-1.074 5.19a.496.496 0 0 0 .734.534c1.844-1.048 4.606-2.624 4.606-2.624l4.604 2.625c.168.092.378.09.541-.029a.5.5 0 0 0 .195-.505l-1.071-5.191 3.919-3.566a.499.499 0 0 0-.28-.865c-2.108-.236-5.269-.586-5.269-.586l-2.183-4.83a.499.499 0 0 0-.909 0l-2.183 4.83z" fill="#f7de00" class="fill-000000"></path></svg>
                    <svg baseProfile="tiny" version="1.2" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m9.362 9.158-5.268.584c-.19.023-.358.15-.421.343s0 .394.14.521c1.566 1.429 3.919 3.569 3.919 3.569-.002 0-.646 3.113-1.074 5.19a.496.496 0 0 0 .734.534c1.844-1.048 4.606-2.624 4.606-2.624l4.604 2.625c.168.092.378.09.541-.029a.5.5 0 0 0 .195-.505l-1.071-5.191 3.919-3.566a.499.499 0 0 0-.28-.865c-2.108-.236-5.269-.586-5.269-.586l-2.183-4.83a.499.499 0 0 0-.909 0l-2.183 4.83z" fill="#f7de00" class="fill-000000"></path></svg>
                    <svg baseProfile="tiny" version="1.2" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m9.362 9.158-5.268.584c-.19.023-.358.15-.421.343s0 .394.14.521c1.566 1.429 3.919 3.569 3.919 3.569-.002 0-.646 3.113-1.074 5.19a.496.496 0 0 0 .734.534c1.844-1.048 4.606-2.624 4.606-2.624l4.604 2.625c.168.092.378.09.541-.029a.5.5 0 0 0 .195-.505l-1.071-5.191 3.919-3.566a.499.499 0 0 0-.28-.865c-2.108-.236-5.269-.586-5.269-.586l-2.183-4.83a.499.499 0 0 0-.909 0l-2.183 4.83z" fill="#f7de00" class="fill-000000"></path></svg>
                    <svg baseProfile="tiny" version="1.2" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m9.362 9.158-5.268.584c-.19.023-.358.15-.421.343s0 .394.14.521c1.566 1.429 3.919 3.569 3.919 3.569-.002 0-.646 3.113-1.074 5.19a.496.496 0 0 0 .734.534c1.844-1.048 4.606-2.624 4.606-2.624l4.604 2.625c.168.092.378.09.541-.029a.5.5 0 0 0 .195-.505l-1.071-5.191 3.919-3.566a.499.499 0 0 0-.28-.865c-2.108-.236-5.269-.586-5.269-.586l-2.183-4.83a.499.499 0 0 0-.909 0l-2.183 4.83z" fill="00000" class="fill-000000"></path></svg>
                    <svg baseProfile="tiny" version="1.2" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m9.362 9.158-5.268.584c-.19.023-.358.15-.421.343s0 .394.14.521c1.566 1.429 3.919 3.569 3.919 3.569-.002 0-.646 3.113-1.074 5.19a.496.496 0 0 0 .734.534c1.844-1.048 4.606-2.624 4.606-2.624l4.604 2.625c.168.092.378.09.541-.029a.5.5 0 0 0 .195-.505l-1.071-5.191 3.919-3.566a.499.499 0 0 0-.28-.865c-2.108-.236-5.269-.586-5.269-.586l-2.183-4.83a.499.499 0 0 0-.909 0l-2.183 4.83z" fill="00000" class="fill-000000"></path></svg>
                </span>
                        
                       
            </div>

            <div class="liste-btl_corps">
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
                   <div  class="liste-btl_info_nom">
                       <a href="{{route('bouteille.show', [$cellier->id, $bouteille->id]) }}"><strong>
                           {{$bouteille->nom}}
                        </strong> <small> {{$bouteille->type}} - {{$bouteille->format}} ml</small></a>
                    </div>
                    
                    <div  class="liste-btl_info_bouteilles" x-data="{counter : {{$bouteille->qte}}, idB : {{$bouteille->id}}, idC : {{$cellier->id}} }" x-on:change="changeQte">
                        <button @click="counter--; if(counter <0){counter = 0}" x-on:click="changeQte"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>

                        <input type="number" x-on:change="changeQte" x-model.number="counter" min="0">
                       
                        <button @click="counter++" x-on:click="changeQte"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>
                    </div>
                
                </div>
            </div>
        </div>
        @empty
        <div>Aucune bouteille dans le cellier</div>
  @endforelse




    </div>   
</div>
@endsection