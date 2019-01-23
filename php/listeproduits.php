<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/listeproduits.css">
    <title>liste des produits</title>
</head>
<body>
    <header>
        <?php include("../include/header.php"); ?>
    </header>

    <section>
       
            <?php
            // PDO -  connection à la base de donnée
            include("./../request/logbdd.php"); 
            // récupération de la valeur passée en url
            $cat= $_GET['cat'];
            // récupération de l'id du membre
            $id_membre = $_SESSION['id'];
            ?>

            <div id="listeCat"> 

            <?php
            $x=1;
            if ($cat == 0){
                // requête pour la liste des produits placés en favoris
                $requete0 = "SELECT PRODUITS.id_produit, urlPhotoPetite_produit, nom_produit, descript_produit FROM PRODUITS JOIN FAVORIS JOIN MEMBRES ON (PRODUITS.id_produit = FAVORIS.id_produit AND  FAVORIS.id_membre = MEMBRES.id_membre) WHERE MEMBRES.id_membre =".$id_membre;
                
                // exécution de la requête
                $req0 = $bdd->query($requete0);
            
                echo "<h1> Catégorie : Mes produits favoris</h1>";
                
                // affichage pour chaque produit de la catégorie :photo, nom  et description
                while($data = $req0->fetch()){
                    echo "<div class='produit' id='prod".$x."'> <img class='image' src='".$data['urlPhotoPetite_produit']. "'/> <div class='text'><p> ".$data['nom_produit']."</p><p class='descrip' >".$data['descript_produit']."</p> </div></div>";
                    echo "<input type='hidden' id='idprod".$x."' value='".$data['id_produit']."'/>";
                    $x++;
                }

            } else {
                // requête pour la liste de produits de la catégorie  et le nom de la catégorie
                $requete = "SELECT PRODUITS.id_produit, urlPhotoPetite_produit, nom_produit, descript_produit, nom_catégorie FROM PRODUITS JOIN APPARTIENT JOIN CATEGORIES_PRODUITS ON (PRODUITS.id_produit = APPARTIENT.id_produit AND APPARTIENT.id_catégorie = CATEGORIES_PRODUITS.id_catégorie) WHERE CATEGORIES_PRODUITS.id_catégorie =".$cat;  
                
                // exécution de la requête
                $req = $bdd->query($requete);
                $nomcat = $req->fetch();
                echo "<h1> Catégorie : ".$nomcat['nom_catégorie']."</h1>";
                
                // affichage pour chaque produit de la catégorie :photo, nom  et description
                while($data = $req->fetch()){
                    echo "<div class='produit' id='prod".$x."'> <img class='image' src='".$data['urlPhotoPetite_produit']. "'/> <div class='text'><p> ".$data['nom_produit']."</p><p class='descrip' >".$data['descript_produit']."</p> </div></div>";
                    echo "<input type='hidden' id='idprod".$x."' value='".$data['id_produit']."'/>";
                    $x++;
                }
            }
            // récupération du nombre de produit
            echo "<input type='hidden' id='variableAPasser' value='".$x."'/>";
            ?>
        </div>

    </section>

    <footer>
        <?php include("../include/footer.php") ?>
    </footer>

<script src="../js/listeprod.js"></script>    
</body>
</html>