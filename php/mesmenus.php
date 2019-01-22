<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/mesmenus.css">
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
			include('../request/mes_menus.php');
			?>
		</header>
		
		<section>

			<div>
			<div class="titre">Mes Menus</div>

            <div>
			
			</div>
				<table class="tftable" border="1">
				<tr><th>id Menu</th><th>Nom Menu</th><th>Date</th><th>Modifier</th></tr>
				<?php

				while ($donnees = $reponse->fetch())
				{
				// echo $donnees['nom_activité'] . '<br />';
				echo '<tr><td>'.$donnees['id_activité'] .'</td><td>'.$donnees['nom_activité'] .'</td><td>17 Mars 2018</td><td><input type="submit" value="Voir"></td></tr>';

				}

				$reponse->closeCursor();
				?>
				</table>

			</div>

			
		</section>

		<footer>
			<?php include("../include/footer.php") ?>
		</footer>
	</body>
</html>