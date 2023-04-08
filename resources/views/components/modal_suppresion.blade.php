<!-- Pour toutes les actions de suppression, ouverture du modal avec message en paramêtre -->
<div class="modal_btn-delete" x-data="{ ismodalopen: false }">
  <button @click="ismodalopen = true" class="btn-reverse">{{ $triggerText }}</button>
  <div class="" x-show="ismodalopen" x-init="$watch('ismodalopen', value => { if (value) { document.body.classList.add('pas-defilement'); } else { document.body.classList.remove('pas-defilement'); } })">
    
    <div class="modal">
      <div class="modal_text">
        {{ $slot }}
      </div>

      <div class="modal_confirm-btn">
        <form  method="post" action="{{ $route }}" >
          @csrf
          @method('delete')
              
          <button type="submit"  class="btn" aria-label="submit">
            <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g clip-rule="evenodd"  fill-rule="evenodd" class="fill-333333"><path d="M29.98 6.819A2.99 2.99 0 0 0 27 4.003h-3V3.001a3 3 0 0 0-3-3H11a3 3 0 0 0-3 3v1.001H5a2.99 2.99 0 0 0-2.981 2.816H2v2.183a2 2 0 0 0 2 2v17a4 4 0 0 0 4 4h16a4 4 0 0 0 4-4v-17a2 2 0 0 0 2-2V6.819h-.02zM10 3.002a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1H10v-1zm16 25c0 1.102-.898 2-2 2H8c-1.103 0-2-.898-2-2v-17h20v17zm2-20.001v1H4V7.002a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1v.999z"></path><path d="M9 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13H9v-13zM15 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13h-2v-13zM21 28.006h2a1 1 0 0 0 1-1v-13a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1zm0-14.001h2v13h-2v-13z"></path></g></svg>
          </button>
        </form>
        <button @click="ismodalopen = false" class="btn-reverse btn-close" aria-label="annuler">
          <svg data-name="Layer 1" height="200" id="Layer_1" viewBox="0 0 200 200" width="200" xmlns="http://www.w3.org/2000/svg"><title/><path d="M114,100l49-49a9.9,9.9,0,0,0-14-14L100,86,51,37A9.9,9.9,0,0,0,37,51l49,49L37,149a9.9,9.9,0,0,0,14,14l49-49,49,49a9.9,9.9,0,0,0,14-14Z"/></svg>
        </button>
      </div>  
    </div>
  </div>
</div>

