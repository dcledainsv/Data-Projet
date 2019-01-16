<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/accueil.css">
		<title>Accueil</title>
		<?php 
    	 
    	?>
	</head>

	<body>
		<header>
			<?php 
			include("../include/header.php");
			/* Liaison BDD */
			include('../request/log-bdd.php');
			/* Select table */
			include('../request/categorie_produit.php');
			?>
		</header>
		
		<section>

			<div>
				<?php

				while ($donnees = $reponse->fetch())
				{
				echo $donnees['nom_catégorie'] . '<br />';
				}

				$reponse->closeCursor();
				?>

			</div>

			
		</section>

		<footer>
			<?php include("../include/footer.php") ?>
		</footer>
	</body>
</html>