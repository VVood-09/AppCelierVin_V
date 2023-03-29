<div class="modal_btn-add" x-data="{ ismodalopen: false }">
  <button @click="ismodalopen = true" ></button>
  <div class="" x-show="ismodalopen"  @keydown.escape.window="ismodalopen = false"  x-init="$watch('ismodalopen', value => { if (value) { document.body.classList.add('pas-defilement'); } else { document.body.classList.remove('pas-defilement'); } })">

    <div class="modal ">
      <div class="modal_text">Vous avez déjà cette bouteille dans ce cellier. Désirez-vous changer la quantité?</div>
      
      <div class="modal_confirm-btn">
        <form class="formBtl_form " method="post" action="{{ $route }}" onsubmit="return false"> 
               
          <input type="number"  min="0" aria-label="Quantité">

          <div class="modal_btn">
            
            <button @click="ismodalopen = false" class="btn-reverse btn-close">
              Annuler
            </button>
            <button type="submit"  class="btn" @click="changeQte()" x-on:click="ismodalopen = false">
              Enregistrer
            </button>
          </div>
        </form>   
      
        
      </div>
    </div>
  </div>
</div>


