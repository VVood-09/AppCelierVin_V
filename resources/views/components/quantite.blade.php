
<div  class="liste-btl_info_bouteilles" x-data="{counter : {{$bouteille->qte}}, idB : {{$bouteille->id}}, idC : {{$cellier->id}}, targetId : {{$bouteille->id}} }" x-on:change="changeQte" title="Change quantité de bouteille">

    <button  @click="counter--; if(counter <0){counter = 0}" x-on:click="changeQte" aria-label="Enlever quantité"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#181818" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#181818" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>


<!-- sert a modifier l'icone lorsque la qte tombe a zero -->

<?php
        $action = 'retirer cette bouteille de votre cellier';
      //  $routeBack = '  Route::get('cellier/{cellier}', [CellierController::class, 'show'])->name('cellier.show');';
        $route = route('bouteille.destroy', ['bouteille' => $bouteille,'cellier' => $cellier->id]);
    ?>

    <x-modal_qte-zero route="{{ $route }}">
        <x-slot name="triggerText">
        <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g clip-rule="evenodd" fill="#181818" fill-rule="evenodd" class="fill-333333"><path d="M29.98 6.819A2.99 2.99 0 0 0 27 4.003h-3V3.001a3 3 0 0 0-3-3H11a3 3 0 0 0-3 3v1.001H5a2.99 2.99 0 0 0-2.981 2.816H2v2.183a2 2 0 0 0 2 2v17a4 4 0 0 0 4 4h16a4 4 0 0 0 4-4v-17a2 2 0 0 0 2-2V6.819h-.02zM10 3.002a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1H10v-1zm16 25c0 1.102-.898 2-2 2H8c-1.103 0-2-.898-2-2v-17h20v17zm2-20.001v1H4V7.002a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1v.999z"></path><path d="M9 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13H9v-13zM15 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13h-2v-13zM21 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13h-2v-13z"></path></g></svg>
        </x-slot>
        Êtes-vous certain de vouloir {{ $action }} ?
    </x-modal_qte-zero>

    <input type="number" x-on:change="changeQte" x-model.number="counter" min="0" aria-label="Quantité">
                       
    <button @click="counter++" x-on:click="changeQte" aria-label="Ajouter quantité"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#181818" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#181818" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#181818" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>

    </div>
