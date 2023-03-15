<div class="relative" x-data="{ ismodalopen: false }">
  <button @click="ismodalopen = true" class="modal-button modal-button-cancel">{{ $triggerText }}</button>
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75" x-show="ismodalopen">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-lg w-2/3 max-w-md">
      <div class="p-4">
        {{ $slot }}
      </div>
      <div class="flex justify-end p-4">

        <button class="modal-button modal-button-confirm">Confirmer</button>
        <button @click="ismodalopen = false" class="modal-button modal-button-cancel">Annuler</button>
      </div>
    </div>
  </div>
</div>

