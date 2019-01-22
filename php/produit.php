<?php session_start();  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/produit.css">
    <title>produit</title>
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
            $idprod= $_GET['idprod'];

        ?>
        <div id="infoProd">

            <?php
            // requête pour les infos sur le produit choisi
            $requete = "SELECT * FROM PRODUITS  WHERE id_produit =".$idprod; 
            
            // exécution de la requête et affichage nom, description et photo
            $req = $bdd->query($requete);
            $prodChoisi = $req->fetch();
            echo "<h1>".$prodChoisi['nom_produit']."</h1>";
            echo "<p id='description'>".$prodChoisi['descript_produit']."</p>";
            echo "<img id='photo' src='".$prodChoisi['urlPhoto_produit']."'/>";

            // affichage ingrédients
            echo "<p> <strong>Ingrédients</strong> : ".$prodChoisi['ingred_produit']."</p>";

            // requete et affichage pour le nutriscore
            $requete5 = "SELECT valeur_NS FROM NUTRI_SCORE JOIN PRODUITS ON (NUTRI_SCORE.id_NS = PRODUITS.id_NS) WHERE PRODUITS.id_produit =".$idprod;
            $req5 = $bdd->query($requete5);        
            $ns = $req5->fetch();
            echo "<input type='hidden' id='valNS' value='".$ns['valeur_NS']."'/>";
            echo "<div id='imgNS'> </div>";
        
            //requete quantite produit
            $requete6 = "SELECT valeur_quantitéProduit FROM QUANTITE_PRODUIT JOIN PRODUITS ON (QUANTITE_PRODUIT.id_quantitéProduit = PRODUITS.id_quantitéProduit) WHERE PRODUITS.id_produit =".$idprod;
            $req6 = $bdd->query($requete6);        
            $quant = $req6->fetch();
            //requete poids produit
            $requete7 = "SELECT valeur_poidsProduits FROM POIDS_PRODUIT JOIN PRODUITS ON (POIDS_PRODUIT.id_poidsProduits = PRODUITS.id_poidsProduits) WHERE PRODUITS.id_produit =".$idprod;
            $req7 = $bdd->query($requete7);        
            $poids = $req7->fetch();
            //requete unite de produit
            $requete8 = "SELECT abrev_unité FROM UNITES JOIN PRODUITS ON (UNITES.id_unité = PRODUITS.id_unité) WHERE PRODUITS.id_produit =".$idprod;
            $req8 = $bdd->query($requete8);        
            $unit = $req8->fetch();
            // affichage quantité, poids et unité du produit
            echo "<p><strong> Quantité</strong> :".$quant['valeur_quantitéProduit']." x ".$poids['valeur_poidsProduits']." ".$unit['abrev_unité'];

            //requete et affichage portion
            $requete9 = "SELECT valeur_portion FROM PORTION JOIN PRODUITS ON (PORTION.id_portion = PRODUITS.id_portion) WHERE PRODUITS.id_produit =".$idprod;
            $req9 = $bdd->query($requete9);        
            $part = $req9->fetch();
            echo "<p id='portion'><strong> Portion</strong> : ".$part['valeur_portion']." g";
            echo "<input type='hidden' id='part' value='".$part['valeur_portion']."'/>";

            // affichage calorie, glucides, lipides, protéines
            echo "<p> <strong>Calorie pour 100g </strong> : ".$prodChoisi['calorie_100g']." cal</p>";
            echo "<p><strong> Lipides pour 100g </strong>: ".$prodChoisi['lipides_100g']." g</p>";
            echo "<p><strong> Glucides pour 100g </strong>: ".$prodChoisi['glucides_100g']." g</p>";
            echo "<p><strong> Protéines pour 100g</strong> : ".$prodChoisi['protéines_100g']." g</p>";
            echo "<p><strong> Sel pour 100g</strong> : ".$prodChoisi['sel_100g']." g</p>";

            // requete et affichage pour les allergenes présents
            $requete2 = "SELECT nom_allergene FROM ALLERGENES JOIN CONTIENT JOIN PRODUITS ON (ALLERGENES.id_allergenes = CONTIENT.id_allergenes AND CONTIENT.id_produit = PRODUITS.id_produit) WHERE PRODUITS.id_produit =".$idprod;
            $req2 = $bdd->query($requete2);
            echo "<p><strong> Allergènes</strong> : ";
            $a=1;
            while($allerg = $req2->fetch()){
            echo $allerg['nom_allergene']." ";
            $a++;
            }
            echo "</p>";
            // requete et affichage pour les traces d'allergenes
            $requete3 = "SELECT nom_allergene FROM ALLERGENES JOIN TRACES JOIN PRODUITS ON (ALLERGENES.id_allergenes = TRACES.id_allergenes AND TRACES.id_produit = PRODUITS.id_produit) WHERE PRODUITS.id_produit =".$idprod;
            $req3 = $bdd->query($requete3);
            echo "<p><strong> Traces</strong> : ";
            $b=1;
            while($traces = $req3->fetch()){
            echo $traces['nom_allergene']." ";
            $b++;
            }
            echo "</p>";
            // requete et affichage pour les additifs
            $requete4 = "SELECT nom_additif FROM ADDITIFS JOIN POSSEDE JOIN PRODUITS ON (ADDITIFS.id_additif = POSSEDE.id_additif AND POSSEDE.id_produit = PRODUITS.id_produit) WHERE PRODUITS.id_produit =".$idprod;
            $req4 = $bdd->query($requete4);
            echo "<p><strong> Additifs</strong> : ";
            $c=1;
            while($add = $req4->fetch()){
            echo $add['nom_additif']." ";
            $c++;
            }
            echo "</p>";

            // stockage de l'id du produit 
            $_SESSION['id_prod'] = $prodChoisi['id_produit'] ;
            ?>
        
        </div>
        <div id="boutons">
            <form action="" method="post">
                <input type="hidden" name="addmenu" value= <?php $prodChoisi['id_produit'] ?>>  
                <input type="submit" value="Ajouter au menu">  
            </form>

            <form action="" method="post">
                <input type="hidden" name="addfavoris" value= <?php $prodChoisi['id_produit'] ?>>
                <input type="submit" value="Ajouter à mes favoris">   
            </form>
        </div>
        <div id="liens">
            <a href="../menu.php">Voir mon menu</a>
            <a href="../catégories.php">Choisir un autre produit</a>
        </div>

    </section>

    <footer>
        <?php include("../include/footer.php") ?>
    </footer>

<script src="../js/produit.js"></script>    
</body>
</html>