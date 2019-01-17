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
            include("./../request/logbdd.php"); 
            
            $cat= $_GET['cat'];
            echo "<h1> Catégorie ".$cat."</h1>";
            ?>

            <div id="listeCat"> 

            <?php

            $requete = "SELECT urlPhotoPetite_produit, nom_produit, descript_produit FROM PRODUITS JOIN APPARTIENT JOIN CATEGORIES_PRODUITS ON (PRODUITS.id_produit = APPARTIENT.id_produit AND APPARTIENT.id_catégorie = CATEGORIES_PRODUITS.id_catégorie) WHERE CATEGORIES_PRODUITS.id_catégorie =".$cat;  
            

            // $bdd = connectbdd();

            $req = $bdd->query($requete);
			$x=1;
			while($data = $req->fetch()){
                echo "<div class='produit' id='".$x."'> <img class='image' src='".$data['urlPhotoPetite_produit']. "'/> <div class='text'><p> ".$data['nom_produit']."</p><p class='descrip' >".$data['descript_produit']."</p> </div></div>";
                $x++;
            }

            ?>
        </div>

    </section>

    <footer>
        <?php include("../include/footer.php") ?>
    </footer>

<!-- <script src="../js/produits.js"></script>     -->
</body>
</html>