<!-- Les "snackbars" -->
<!-- Retour d'action sur le site -->
<!-- Connexion, ajout/modification/suppresion de bouteilles/celliers/commentaires -->

<div id="notification" x-data="{ showNotification: false, message: '' }" x-init="() => {
        message = `{{ session('success') }}`; 
        if (message) {
            showNotification = true;
            message = message.replaceAll('\\\'', '\'');
            setTimeout(() => showNotification = false, 5000); 
        
        }   
    }">

    <div x-show="showNotification" class="retourAction" @click="showNotification = false">
        <p x-text="message"></p>
    </div>
</div>