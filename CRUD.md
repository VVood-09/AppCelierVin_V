## Liste des requêtes et intentions, sprint 3



#### Pour l'admin

###### Gestion d'utilisateur
Ajout de Destroy dans AdminUtilisateurController pour supprimer des utilisateurs.

###### Pour les statistiques sur le site
Création du modèle Statistiques pour la créer des données pour voir :
-la quantité de vin sur le site
-la quantité moyenne de cellier par utilisateur
-la quantité moyenne de bouteilles par cellier
-la quantité moyenne de commentaires par bouteilles
-la quantité d'utilisateur créer par mois
-la quantité de connexion par mois
-top 5 des vins les mieux côtés
-le vin dans le plus de cellier
-le pourcentage de type de vin consommée
-autres selon demande du client

Offre aussi une liste de tous les vins avec la quantité de commentaire, de note, la moyenne de note et la quantité dans les celliers



#### Pour les commentaires d'un utilisateur sur une bouteille
Pour la gestion des commentaires, une création complête d'un Controller:
-fonction Store($request) / pour ajouter des commentaires sur une bouteilles
-fonction Update($request) / mise à jour d'un commentaire
-fonction Delete($request) / suppression de commentaire

Ajout d'une requête dans VinController->show($request) pour avoir la liste des commentaires de l'utilisateur sur une bouteille.



#### Pour vérifier l'ajout d'une bouteille en double dans mon cellier
Dans la fonction Store du VinController, ajout de requête pour vérifier si le vin qui tente d'être ajouté est déjà dans le cellier. Si oui, proposer d'augmenter la quantité.



#### Modification du Scraper
Changement à la boucle, la mettre Frond-end pour permettre au serveur de ne pas s'executer plus d'une minute à la fois.
Séparation du ScraperController en trois partie:
-fonction Index() / la vue
-fonction Pages() / la requête pour la quantité de vin à trouver
-fonction Scraper($request) / l'ajout ou mise à jour d'une liste de bouteille sur une page SAQ