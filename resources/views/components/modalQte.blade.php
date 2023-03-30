@if (session('show_modal'))

<script>
function changeQte() {
  console.log('changeQte function called'); // Add this line to check if the function is being called
  // Rest of the code
}
</script>

  <div class="modal_btn-add" x-data="{ismodalopen: true}" id="modalQte">
    <div  x-show="ismodalopen"  @keydown.escape.window="ismodalopen = false"  x-init="$watch('ismodalopen', value => { if (value) { document.body.classList.add('pas-defilement'); } else { document.body.classList.remove('pas-defilement'); } })">

      <div class="modal ">
        <div class="modal_text">Vous avez déjà cette bouteille dans ce cellier. Désirez-vous changer la quantité?</div>
        <form  class="liste-btl_info_bouteilles" x-data="{counter : {{session('qte')}}, idB : {{session('bouteille_id')}}, idC : {{session('cellier_id')}} }" x-on:change="changeQte" title="Change quantité de bouteille" onsubmit="return false">
      
            <button @click="counter--; if(counter <0){counter = 0}" x-on:click="changeQte" aria-label="Enlever quantité"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>
                              
            <input type="number" x-on:change="changeQte" x-model.number="counter" min="0" aria-label="Quantité">
                                          
            <button @click="counter++" x-on:click="changeQte" aria-label="Ajouter quantité"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>
            
        </form> 

        <div class="modal_confirm-btn">
          <div class="modal_btn">
            <button @click="ismodalopen = false" class="btn-reverse btn-close">
              Annuler
            </button>
                <a href="{{ route('cellier.show', ['cellier' => session('cellier_id') ]) }}" class="btn">Confirmer</a>

          </div>
        </div>
      </div>
    </div>
  </div>

@endif






