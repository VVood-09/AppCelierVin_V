<div class="modal_btn-add" x-data="{ ismodalopen: false }">
  <button @click="ismodalopen = true" ><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>
  <div class="" x-show="ismodalopen"  @keydown.escape.window="ismodalopen = false"  x-init="$watch('ismodalopen', value => { if (value) { document.body.classList.add('no-scroll'); } else { document.body.classList.remove('no-scroll'); } })">
    <div class="modal">

    
      <button @click="ismodalopen = false" class="btn-reverse ">

          <svg data-name="Layer 1" height="200" id="Layer_1" viewBox="0 0 200 200" width="200" xmlns="http://www.w3.org/2000/svg"><title/><path d="M114,100l49-49a9.9,9.9,0,0,0-14-14L100,86,51,37A9.9,9.9,0,0,0,37,51l49,49L37,149a9.9,9.9,0,0,0,14,14l49-49,49,49a9.9,9.9,0,0,0,14-14Z"/></svg>
         </button>

      <form class="formBtl_form" method="post" action="{{ $route }}" >
          @csrf
          <textarea class="modal_commentaire-textarea"  placeholder="Ecrivez votre commentaire..."></textarea>
        
          <div class="modal_confirm-btn">
          <button type="submit"  class="btn">
          <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><g fill="#ffffff" fill-rule="evenodd" class="fill-000000"><path d="M21.59 47.41a2.5 2.5 0 0 0 3.536 0L53.41 19.126a2.5 2.5 0 0 0-3.536-3.536L21.59 43.874a2.5 2.5 0 0 0 0 3.536Z"></path><path d="M10.429 32.929a2.5 2.5 0 0 1 3.535 0l10.607 10.607a2.5 2.5 0 0 1-3.535 3.535L10.429 36.464a2.5 2.5 0 0 1 0-3.535Z"></path></g></svg>
          </button>
        </div>
      </form>   
       
    </div>
  </div>
</div>


