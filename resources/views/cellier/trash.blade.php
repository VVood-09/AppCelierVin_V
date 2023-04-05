{{-- <div class="liste-btl_liste"> --}}

{{--@forelse($bouteilles as $bouteille)
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
            @for($i = 1; $i <= 5; $i++)
            <svg class="
                @if($i <= $bouteille->note)
                note_jaune
                @else
                note_vide
                @endif
                " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            @endfor
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
            <img src="{{ asset('assets/img/icon_PW2/btl-alt_maison.svg') }}" alt="{{$bouteille->nom}}" class="liste-btl_img_alt">
        @endisset
        </div>
        <div class="liste-btl_info">
           <div  class="liste-btl_info_nom">
               <a href="{{route('bouteille.show', [$cellier->id, $bouteille->id]) }}"><strong>
                   {{$bouteille->nom}}
                </strong> <small> {{$bouteille->type}} - {{$bouteille->format}} ml</small></a>
            </div>
            
        <x-quantite :bouteille="$bouteille" :cellier="$cellier"/>
        
        </div>
    </div>
</div>
@empty
<div>Aucune bouteille dans le cellier</div>
@endforelse --}}




{{-- Avec l'utilisation de Alpine.js pour Sort() et de Laravel, la syntaxe a employé limite la manière de faire les choses. Dans le cas que la composante Quantite doit être usé avec un object contenant les informations de `item` provenant d'alpine `x-data`, `item` n'est pas un objet transferable dans la composante donc il doit être créé manuellement avec les informations de $bouteilles. `item` ne peut pas non plus être mis dans une variable pour php puisque c'est du JSON front-end. --}}
                            {{-- Cette boucle est trop exigeante sur des grosses liste --}}
                            {{-- @forelse($bouteilles as $bouteille)
                            <template x-if="item.nom.toString() == `{{$bouteille->nom}}`">
                                @php
                                $item = (object)array('qte' => $bouteille->qte, 'id' => $bouteille->id);
                                @endphp
                                <x-quantite :bouteille="$item" :cellier="$cellier"/>
                            </template>
                            @empty
                            @endforelse --}}
                            {{-- Malheureusement, 
                                https://gist.github.com/jasonlbeggs/1341e7367c0dc69ac64ef2140d0f0591
                                ne semble pas fonctionner. --}}
                            {{-- <x-quantite ::bouteille="item" :cellier="$cellier"/> --}}