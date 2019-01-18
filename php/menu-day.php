<!DOCTYPE html>
<<<<<<< HEAD
<<<<<<< HEAD
<html>
	<head>
		<meta charset="UTF-8">
	    <link rel="stylesheet" href="../css/style.css">
	    <link rel="stylesheet" href="../css/menu-day.css">
	    <title>Menu du jour</title>
=======
=======
>>>>>>> cca590b2b66ae840813613c0eaeeecb7137598fb
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu-day.css">
		<title>Accueil</title>
		<?php 
    	 
    	?>
<<<<<<< HEAD
>>>>>>> d8a09abc49654bfc3b8683fc519a66090edc9cdb
=======
>>>>>>> cca590b2b66ae840813613c0eaeeecb7137598fb
	</head>

	<body>
		<header>
<<<<<<< HEAD
<<<<<<< HEAD
			<?php include("../include/header.php"); ?>
		</header>

		<section>
			<h1>Composition du menu de la journée</h1>
		</section>


=======
=======
>>>>>>> cca590b2b66ae840813613c0eaeeecb7137598fb
			<?php 
			include("../include/header.php");
			/* Liaison BDD */
			// include('../request/log-bdd.php');
			/* Select table */
			// include('../request/categorie_produit.php');
			?>
		</header>
		
		<section>
            <h1>Composition du menu de la journee</h1>

            <div class="menu" id="tab_1">
                <div class="aliment"><img class="image" src="https://static.openfoodfacts.org/images/products/376/004/979/4298/front_fr.77.200.jpg" alt="pain"> </div>
                    
                    <div class="taux">
                        <div class="pourcentage">0%</div>
                        <div id="glucides">Glucides</div>
                    </div>
                    <div class="taux">
                        <div class="pourcentage">0%</div>
                        <div id="lipides">Lipides</div>
                    </div>
                    <div class="taux">
                        <div class="pourcentage">0%</div>
                        <div id="proteines">Protéines</div>
                    </div>
                    <div class="taux">
                        <div class="pourcentage">0</div>
                        <div id="calories">Calories</div>
                    </div>
            </div>

            <div class="menu" id="tab_2">
                <div class="aliment"><img class="image" src="https://static.openfoodfacts.org/images/products/376/004/979/4298/front_fr.77.200.jpg" alt="pain"> </div>
                
                <div class="taux">
                    <div class="pourcentage">12%</div>
                    <div id="glucides">Glucides</div>
                </div>
                <div class="taux">
                    <div class="pourcentage">04%</div>
                    <div id="lipides">Lipides</div>
                </div>
                <div class="taux">
                    <div class="pourcentage">12%</div>
                    <div id="proteines">Protéines</div>
                </div>
                <div class="taux">
                    <div class="pourcentage">200</div>
                    <div id="calories">Calories</div>
                </div>
            </div>
            
            <div id="produits">
				<form method="post" action="#">
					<div id="listProduit"> <!-- Bloc contenant les produits créés par la fonction "menu-day.js" -->
					</div>

					<div id="addProduit"> + </div> <!-- Ajouter un produit -->

					<input type="text" name="" placeholder="Nom"> 
					<input type="submit" name="" value="Enregistrer">
				</form>
			</div>

			
		</section>

		<footer>
			<?php include("../include/footer.php") ?>
		</footer>
<<<<<<< HEAD
>>>>>>> d8a09abc49654bfc3b8683fc519a66090edc9cdb
=======

		<script type="text/javascript" src="../js/menu-day.js"></script>
>>>>>>> cca590b2b66ae840813613c0eaeeecb7137598fb
	</body>
</html>