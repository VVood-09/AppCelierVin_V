<div x-data="{ ismodalopen: false }">
    <button @click="ismodalopen = true" class="modal-button modal-button-cancel">{{ $triggerText }}</button>
    <div x-show="ismodalopen">
        <div class="modal .modal-selector">
            <div class="modal-content .modal-selector-content">
                <span class="close" @click="ismodalopen = false">&times;</span>
                <p>{{ $slot }}</p>
                <button class="modal-button modal-button-confirm">Confirmer</button>
                <button @click="ismodalopen = false" class="modal-button modal-button-cancel">Annuler</button>
            </div>
        </div>
    </div>
</div>