<?php

// récupération des données age poids taille activité du membre

// PDO -  connection à la base de donnée
include("logbdd.php"); 
// récupération de l'identifiant du membre connecté
$idMembre= $_SESSION['id'];

// requête pour infos du membre connecté
$requete = "SELECT * FROM MEMBRES WHERE id_membre = 1 ";        // .$idMembre;
// exécution de la requête
$req = $bdd->query($requete);
$membre = $req->fetch();

 //récupération des infos
$pseudo = $membre['pseudo_membre'];
$prenom = $membre['prenom_membre'];
$nom = $membre['nom_membre'];
$password = $membre['password_membre'];
$email = $membre['email_membre'];
$dateInscription = $membre['dateInscription_membre'];
$dateN = $membre['dateNaissance_membre'];
$poids = $membre['poids_membre'];
$taille = $membre['taille_membre'];
$activite = $membre['id_activité'];
$sexe = $membre['id_sexe'];

//calcul age du membre
    // décomposition de la date retourné sous forme yyyy-mm-dd dans un tableau : [0]=année, [1]=mois, [2]=jour
    $dateMembre = explode('-',$dateN);
    // décomposition de la date du jour (yy/mm/dd)
    $dateAuj = explode('/', date('20y/m/d'));
    // détermination de l'age du membre
    if (($dateMembre[1] < $dateAuj[1]) || (($dateMembre[1] == $dateAuj[1]) && ($dateMembre[0] < $dateAuj[0]))){
        $age = $dateAuj[0] - $dateMembre[0];
    } else {
        $age = $dateAuj[0] - $dateMembre[0] -1;
    }

// calcul du métabolisme de base du membre en fonction du sexe
    if ($sexe == 1){
        $base = 66.5 + (13.75 * $poids) + (5 * $taille) - (6.77 * $age);
    } else {
        $base = 655 + (9.56 * $poids) + (1.85 * $taille) - (4.67 * $age);
    }
// calcul des besoins journaliers  en fonction de l'activité
    if ($activite == 1) {
        $bj = $base * 1.2;
    } elseif ($activite == 2) {
        $bj = $base * 1.375;
    } elseif ($activite == 3) {
        $bj = $base * 1.55;
    } else {
        $bj = $base * 1.725;
    }


?>