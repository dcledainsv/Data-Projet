<?php session_start(); 
include("../request/panier.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>catégories</title>
</head>
<body>

<header>
    <?php include("../include/header.php"); ?>
</header>

<section>
    <h1>Composition du menu</h1>

    <?php
    // echo $_SESSION['id'];
    //  var_dump($_SESSION['panier']);
     $panier = $_SESSION['panier'];
     // compte du nombre de produit = nbre de ligne dans tableau $panier
         foreach($panier as $ligne){
            $nbre = count($ligne); 
            }
            echo "<input type='hidden' id='nbreProd' value='".$nbre."'/>";
      
     // affichage pour chaque produit
           for ($i=0; $i < $nbre; $i++){
            echo "<h2>".$panier['nomProduit'][$i]."</h2>";
            echo "<div class='produit' id='prod".$i."'>";
            echo "<div class='aliment'>";
            echo "<img class='image' src='".$panier['photoProduit'][$i]."'/></div> ";
            echo "<div class='compo'>";
            echo "<div class='qte' id='qteG".$i."'>".round(($panier['glucidesProduit'][$i]*$panier['portionProduit'][$i]/100),1)." g</div>";
            echo "<div class='glucides'>Glucides</div> </div>";
            echo "<div class='compo'>";
            echo "<div class='qte'>".round(($panier['lipidesProduit'][$i]*$panier['portionProduit'][$i]/100),1)." g</div>";
            echo "<div class='lipides'>Lipides</div> </div>";
            echo "<div class='compo'>";
            echo "<div class='qte'>".round(($panier['proteinesProduit'][$i]*$panier['portionProduit'][$i]/100),1)." g</div>";
            echo "<div class='proteines'>Protéines</div> </div>";
            echo "<div class='compo'>";
            echo "<div class='qte'>".round(($panier['calorieProduit'][$i]*$panier['portionProduit'][$i]/100),1)."</div>";
            echo "<div class='calories'>Calories</div> </div> </div>";
    
            // calcul pour les portions
                $demi[$i] = $panier['portionProduit'][$i] /2;
                $undemi[$i] = $panier['portionProduit'][$i] *1.5;
                $double[$i] = $panier['portionProduit'][$i] *2;
            // affichage choix portions
            echo " <div class='choixPortion'>";
            echo "<p> Choix portion :</p>";
            echo " <input type='button' onclick='selectDemiP($i)' class ='portion' id='demiP".$i."' value='".$demi[$i]." g' > ";
            echo " <input type='button' onclick='selectP($i)' class ='portion defaut' id='P".$i."'value='".$panier['portionProduit'][$i]." g'>";
            echo " <input type='button' onclick='selectUndemiP($i)' class ='portion' id='undemiP".$i."' value='".$undemi[$i]." g'>";
            echo " <input type='button' onclick='selectDoubleP($i)' class ='portion' id='doubleP".$i."' value='".$double[$i]." g'> </div>";
    
         }
    ?>

    <!-- bouton pour ajout d'un produit -->
    <div id="ajout"> <a href="categories.php"> + </a></div>

    <!-- formulaire pour enregistrement du menu -->
    <form action="" method="post">
        <label for="nomMenu">nom du menu :</label>
        <input type="text" name="nomMenu" required>
        <?php   
        // id des produits  + nbre portions (0.5 , 1 , 1.5  ou  2)  pour chacun
            for ($i=0; $i < $nbre; $i++){
                echo " <input type='hidden' name='idprod".$i."' value='".$panier['idProduit'][$i]."'>";
                echo " <input type='hidden' name='portion".$i."' value='1' >";
            }
        ?>
        <input type="submit" value="Enregistrer">
    </form>
    <?php   include ("../request/enregistrMenu.php") ?>
    <!-- requête infos du membre connecté et calcul de ses besoins journaliers $bj -->
    <?php
        include ("../request/calculBJ.php");
    ?>
    

    <div id="comparaison">
        <!-- affichage besoins journaliers du membre -->
        <div class="cal">
            <p class="bj">Vos besoins journaliers : </p>     
            <div id="besoinMembre"> <?php echo round($bj,1); ?> </div>
            <p class="unitBJ"> Kcal</p>
        </div>  
        <!-- calcul nombre de calories du menu   -->
        <?php  
        for ($i=0; $i < $nbre; $i++){
            $totCal = $totCal + ($panier['calorieProduit'][$i] * $panier['portionProduit'][$i] /100);
        } ?>

        <!-- affichage du nombre de calories du menu -->
        <div class="cal">
            <p class='bj'>Les apports du menu :</p>     
            <div id="calMenu"> <?php echo round($totCal,1); ?></div>
            <p class="unitBJ"> Kcal</p>
        </div>
        <?php
        echo "<input type='hidden' id='valBJ' value='".$bj."'/>";
        echo "<input type='hidden' id='valCalMenu' value='".$totCal."'/>";
        ?>
    </div>

        <?php
            // calcul du taux de G, L et P
            $totG = array_sum($panier['glucidesProduit']);
            $totL = array_sum($panier['lipidesProduit']);
            $totP = array_sum($panier['proteinesProduit']);
            $tot = $totG + $totL + $totP;
            $tauxG = $totG * 100 / $tot;
            $tauxL = $totL * 100 / $tot;
            $tauxP = $totP * 100 / $tot;
        ?>

     <!-- affichage des proportions en G, L et P du menu -->
         <div id="proportion">

            <div class="taux">
                <div class="cible">40-50 %</div>
                <div class="pourcentage" id="G"><?php echo round($tauxG,1); ?> %</div>
                <div class="glp" id="gluc">Glucides</div>
            </div>
            <div class="taux">
                <div class="cible">30-40 %</div>
                <div class="pourcentage" id="L"><?php echo round($tauxL,1); ?> %</div>
                <div class="glp" id="lip">Lipides</div>
            </div>
            <div class="taux">
                <div class="cible">15-29 %</div>
                <div class="pourcentage" id="Pr" ><?php echo round($tauxP,1); ?> %</div>
                <div class="glp" id="prot">Protéines</div>
            </div>
            <?php 
                echo "<input type='hidden' id='tauxG' value='".$tauxG."'/>";
                echo "<input type='hidden' id='tauxL' value='".$tauxL."'/>";
                echo "<input type='hidden' id='tauxP' value='".$tauxP."'/>";
            ?>
             
         </div>

</section>

<footer>
    <?php include("../include/footer.php") ?>
</footer>

   <script src="../js/menu.js"></script> 
</body>
</html>    
