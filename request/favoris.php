<?php
// session_start();

// récupération de l'id du membre connecté
$idMembre = $_SESSION['id'];

//vérification présence données
if (isset($_POST['addfavoris']) && !empty($_POST['addfavoris'])){
    
    // récupération de l'id du produit
    $idProd = $_POST['addfavoris'];
    
    // connection à la base de données
    include("logbdd.php"); 
    
    // requete insertion des données dans la table de jonction FAVORIS
    $requete = 'INSERT INTO FAVORIS VALUES ("'.$idProd.'","'.$idMembre.'")';
    
    // préparation et execution de la requete 
    $req = $bdd->prepare($requete);   
    $req = $bdd->exec($requete); 
    
    // message de confirmation
    echo "Le produit a été ajouté à vos favoris";
    
} 


?>