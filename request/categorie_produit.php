<?php
// On récupère tout le contenu de la table categorie produit
$reponse = $bdd->query
('SELECT * 
FROM CATEGORIES_PRODUITS
ORDER BY nom_catégorie ASC');

?>