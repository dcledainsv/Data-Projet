<?php
// récupération de l'id du membre connecté
$idMembre = $_SESSION['id'];
//var_dump($_POST);

//vérification présence données
if (isset($_POST['nomMenu']) && !empty($_POST['nomMenu'])){

    // récupération des données
    $nomMenu = $_POST['nomMenu'];
    
    for ($i=0; $i < $nbre; $i++){
        $idprod[$i] = $_POST['idprod'.$i];
        $portion[$i] = $_POST['portion'.$i];   
    } 
    
    // connection à la base de données
    include("logbdd.php"); 

    // requête d'insertion du nom du menu avec date du jour selon membre connecté
    $requete1 = 'INSERT INTO MENU VALUES ("","'.$nomMenu.'", NOW(),"'.$idMembre.'" )';

    // préparation et execution de la requete 
    $req1 = $bdd->prepare($requete1);   
    $req1 = $bdd->exec($requete1); 
    
    // récupération de l'id_menu
    // $idMenu = $bdd->insert_id;
    $idMenu = $bdd->lastInsertId();
  
    // requêtes d'insertion des id_produits composant le menu
    for ($i=0; $i < $nbre; $i++){
        $requete[$i] = 'INSERT INTO COMPOSE VALUES ("'.$idprod[$i].'","'.$idMenu.'","'.$portion[$i].'")';
    
        // préparation et execution des requêtes 
        $req[$i] = $bdd->prepare($requete[$i]);   
        $req[$i] = $bdd->exec($requete[$i]); 
    }

    // message de confirmation
    echo "Le menu a bien été sauvegardé.";
    

} 


?>