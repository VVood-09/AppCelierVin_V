@extends('layouts.app')
@section('title', 'Cellier')
@section('content')

<div class="liste-btl_body">
    <div class="liste-btl_title">
         <h1>Cellier : {{$cellier->nom}}</h1> 
         <a href="{{ route('cellier.edit', $cellier->id)}}" title="Modifier cellier"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a> 
    </div>

<!-- Injection fonction pour trie et recherche-->
        <section x-data="{ bouteilles: JSON.parse(`{{ $bouteilles }}`),
            triage(bouteilles){

                /**
                * Fonction pour trier les bouteilles dans le cellier
                * https://www.raymondcamden.com/2022/05/02/building-table-sorting-and-pagination-in-alpinejs
                * @param {array} bouteilles 
                * modifié pour fonctionner sur un select avec des querySelectors
                */

                if(this.sauvegarde == undefined) {
                    this.sauvegarde = bouteilles;
                }

                this.colonneTri = document.querySelector('#tri-select').value;
                if(this.colonneTri == ''){
                    this.colonneTri = 'nom';
                }

                this.triAsc = document.querySelector('#ordre-select').value;
                if(this.triAsc == 'desc'){
                    this.triAsc = false;
                } else {
                    this.triAsc = true
                }
            
                let champRecherche = document.querySelector('.cellier_recherche').value.toLowerCase();
                let bouteillesFiltrees;
                if (champRecherche != '') {
                  bouteillesFiltrees = this.sauvegarde.filter(bouteille => bouteille.nom.toLowerCase().includes(champRecherche) || bouteille.pays.toLowerCase().includes(champRecherche) || bouteille.type.toLowerCase().includes(champRecherche));
                } else {
                    bouteillesFiltrees = this.sauvegarde;
                }
            
                if(this.colonneTri == 'note'){
                  bouteillesFiltrees.sort((a, b) => {
                    if(a[this.colonneTri] < b[this.colonneTri]) return this.triAsc?1:-1;
                    if(a[this.colonneTri] > b[this.colonneTri]) return this.triAsc?-1:1;
                    return 0;
                  });
                } else {
                  bouteillesFiltrees.sort((a, b) => {
                    const resultatTri = a[this.colonneTri].localeCompare(b[this.colonneTri]);
                    if(resultatTri === 0) return 0;
                    return this.triAsc ? resultatTri : -resultatTri;
                  });
                }
              
                this.bouteilles = bouteillesFiltrees;
            } 
        }" class="liste-btl_liste">
        
            <template x-if="bouteilles == '' && {{$bouteilles}} == ''">
                <section class="liste-btl_vide">
                    <p>Aucune bouteille dans le cellier.</p>
                    <a href="{{ route('bouteille.create')}}" class="btn">Ajouter une bouteille</a>
                </section>
        </template>

<!-- Injection des tries-->
            <template x-if="{{$bouteilles}} != ''">
                <div class="formBtl_form">
                    <input @keyup="triage(bouteilles)" type="text" class="cellier_recherche" placeholder="Recherchez dans votre cellier" aria-label="Recherche cellier">
                    <nav class="triage">
                        <select id="tri-select" @change="triage(bouteilles)">
                            <option value="">Trier par</option>
                            <option value="nom">Nom</option>
                            <option value="pays">Pays</option>
                            <option value="type">Type</option>
                            <option value="note">Note</option>
                        </select>
                        <select id="ordre-select" @change="triage(bouteilles)">
                            <option value="">Ordre du tri</option>
                            <option value="asc">Ascendant</option>
                            <option value="desc">Descendant</option>
                        </select>
                    </nav>
                </div>
            </template>

            <template x-if="bouteilles == '' && {{$bouteilles}} != ''">
                <section class="liste-btl_vide">
                    <p>Aucune bouteille n'a été trouvée</p>
                </section>
            </template>
    
            <template x-for="(item, cle) in bouteilles">
                <article class="liste-btl_carte" :id="item.id">
                    <div class="liste-btl_tete">
                        <div class="liste-btl_tete_pays">
                            <svg enable-background="new 0 0 48 48" height="48px" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Expanded"><g><g><path d="M22.007,35c-9.374,0-17-7.626-17-17s7.626-17,17-17s17,7.626,17,17S31.381,35,22.007,35z M22.007,3c-8.271,0-15,6.729-15,15s6.729,15,15,15s15-6.729,15-15S30.278,3,22.007,3z"/></g><g><path d="M22.007,39.99c-5.634,0-11.268-2.145-15.557-6.433l1.414-1.414c7.799,7.797,20.487,7.798,28.284,0c7.798-7.798,7.798-20.487,0-28.285l1.414-1.414c8.578,8.578,8.578,22.535,0,31.113C33.274,37.845,27.641,39.99,22.007,39.99z"/></g><g><rect height="4.05" width="2" x="20.007" y="38.976"/></g><g><rect height="4.05" width="2" x="22.007" y="38.976"/></g><g><path d="M36.973,48H7.04l2.403-1.8c3.668-2.748,8.013-4.2,12.563-4.2s8.895,1.452,12.562,4.2L36.973,48z M13.547,46h16.92c-2.617-1.315-5.49-2-8.46-2S16.163,44.685,13.547,46z"/></g><g><path d="M5.743,35.264c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l2.828-2.828c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L6.45,34.971C6.255,35.166,5.999,35.264,5.743,35.264z"/></g><g><path d="M35.441,5.565c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l2.828-2.828c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414l-2.828,2.828C35.953,5.468,35.697,5.565,35.441,5.565z"/></g></g></g></svg>
                            <p x-text="item.pays"></p>
                        </div>                   
                        <p x-text="item.type"></p>      
                    </div>

                    <div class="liste-btl_corps">
                        <div class="liste-btl_img">
                            <template x-if="item.code_saq != null && item.image != null">
                                <img x-bind:src="item.image" x-bind:alt="item.nom" class="saq">
                            </template>
                            <template x-if="item.code_saq == null && item.image != null">
                                <img x-bind:src="'{{asset('storage/uploads')}}'+'/'+ item.image" x-bind:alt="item.nom" >
                            </template>
                            <template x-if="item.code_saq == null && item.image == null">
                                <img src="{{asset('assets/img/icon_PW2/btl-alt_maison.svg')}}" x-bind:alt="item.nom" class="liste-btl_img_alt">
                            </template>
                        </div>
                        <div class="liste-btl_info">
                           <div  class="liste-btl_info_nom">
                                <a :href="`{{route('bouteille.show', [$cellier->id, ''])}}/${item.id}`">
                                    <strong x-text="item.nom"></strong>
                                </a>
                            </div>

<!-- Injection des étoiles pour la note-->
                            <section>
                                <span class="liste-btl_info_etoile">
                                    @for($i = 1; $i <= 5; $i++)
                                    <svg :class="{'note_couleur': {{$i}} <= item.note, 'note_vide': {{$i}} > item.note}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    @endfor
                                </span>   

<!-- Injection du composant de gestion de quantité de bouteilles-->
                                <div  class="liste-btl_info_bouteilles" x-data="{idC : `{{$cellier->id}}` }" x-on:change="changeQte" title="Change quantité de bouteille">
                                    <button :class="{'modal_display-none': item.qte == 0}" @click="item.qte--; if(item.qte < 0){item.qte = 0}" x-on:click="changeQte(item.qte, item.id)" aria-label="Enlever quantité"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>
<!-- Injection du modal de suppression (appel pas possible, donc inection)-->
                                    <div class="modal_btn-delete" x-data="{ modalouvert: false }">

                                        <button aria-label="Supprimer" :class="{'corbeille': true, 'modal_display-none': item.qte != 0}" @click="modalouvert = true" ><svg viewBox="0 0 32 32"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g clip-rule="evenodd" fill-rule="evenodd" class="fill-333333"><path d="M29.98 6.819A2.99 2.99 0 0 0 27 4.003h-3V3.001a3 3 0 0 0-3-3H11a3 3 0 0 0-3 3v1.001H5a2.99 2.99 0 0 0-2.981 2.816H2v2.183a2 2 0 0 0 2 2v17a4 4 0 0 0 4 4h16a4 4 0 0 0 4-4v-17a2 2 0 0 0 2-2V6.819h-.02zM10 3.002a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1H10v-1zm16 25c0 1.102-.898 2-2 2H8c-1.103 0-2-.898-2-2v-17h20v17zm2-20.001v1H4V7.002a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1v.999z"></path><path d="M9 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13H9v-13zM15 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13h-2v-13zM21 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13h-2v-13z"></path></g></svg></button>

                                        <div class="" x-show="modalouvert" x-init="$watch('modalouvert', value => { if (value) { document.body.classList.add('pas-defilement'); } else { document.body.classList.remove('pas-defilement'); } })">
                                            <div class="modal">

                                                <div class="modal_text">
                                                    Êtes-vous certain de vouloir retirer cette bouteille de votre cellier?
                                                </div>
                                            
                                                <div class="modal_confirm-btn">
                                                
                                                    <form method="post" :action="`{{route('bouteille.destroy', [$cellier->id, ''])}}/${item.id}`">
                                                    @csrf
                                                    @method('delete')
                                                        
                                                        <button aria-label="Submit" type="submit"  class="btn" >
                                                            <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g clip-rule="evenodd" fill-rule="evenodd" class="fill-333333"><path d="M29.98 6.819A2.99 2.99 0 0 0 27 4.003h-3V3.001a3 3 0 0 0-3-3H11a3 3 0 0 0-3 3v1.001H5a2.99 2.99 0 0 0-2.981 2.816H2v2.183a2 2 0 0 0 2 2v17a4 4 0 0 0 4 4h16a4 4 0 0 0 4-4v-17a2 2 0 0 0 2-2V6.819h-.02zM10 3.002a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1H10v-1zm16 25c0 1.102-.898 2-2 2H8c-1.103 0-2-.898-2-2v-17h20v17zm2-20.001v1H4V7.002a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1v.999z"></path><path d="M9 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13H9v-13zM15 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13h-2v-13zM21 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13h-2v-13z"></path></g></svg>
                                                        </button>

                                                    </form>

                                                    <button aria-label="Modal" @click="modalouvert = false" class="btn-reverse btn-close">
                                                        <svg data-name="Layer 1" height="200" id="Layer_1" viewBox="0 0 200 200" width="200" xmlns="http://www.w3.org/2000/svg"><title/><path d="M114,100l49-49a9.9,9.9,0,0,0-14-14L100,86,51,37A9.9,9.9,0,0,0,37,51l49,49L37,149a9.9,9.9,0,0,0,14,14l49-49,49,49a9.9,9.9,0,0,0,14-14Z"/></svg>
                                                    </button>
                                                </div>  
                                            </div>
                                        </div>
                                    </div> 
                            
                                    <input type="number" x-on:change="changeQte(item.qte, item.id)" x-model="item.qte" min="0" aria-label="Quantité">
                                                   
                                    <button @click="item.qte++" x-on:click="changeQte(item.qte, item.id)" aria-label="Ajouter quantité"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>

                                </div>
                            </section>
                        </div>
                    </div>
                </article>
            </template>
        </section>
    </div>   
</div>

<!-- Appel au composant de notification de retour d'action-->
<div>
    <x-notification ></x-notification>
</div>
@endsection