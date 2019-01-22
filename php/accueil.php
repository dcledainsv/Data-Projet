<?php
	session_start();

	include("../request/logbdd.php"); // Inclue le fichier pour connexion à la base de donnée

	if (isset($_GET['id']))
	{
		$getId = intval($_GET['id']); // Converti en nombre la saisie

		$reqUser = $bdd->prepare("SELECT * FROM MEMBRES WHERE id_membre = ?");
		$reqUser->execute(array($getId));
		$userInfo = $reqUser->fetch();
	}

	// Selon l'utilisateur
	if (isset($_SESSION['id']) AND $userInfo['id_membre'] == $_SESSION['id'])
	{
		$pseudoUser = $userInfo['pseudo_membre'];
	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/accueil.css">
		<title>Accueil</title>
	</head>

	<body>
		<header>
			<?php include("../include/header.php"); ?>
		</header>

		<section>
			<div>
				<img src="../img/ferme.png" alt="Bannière d'image du site" class="image-banner">
			</div>

			<div>
				<p>Bienvenue <span class="pseudo"><?php echo $pseudoUser; ?></span> sur <img src="../img/logo-web.png" alt="logo-biomiam" class="logo-web-paragraph">, un site pour vous aider à concevoir votre menu du jour à partir de produits Bio, d'origine française avec les meilleures notes nutritionnelles (nutri-score A et B).</p>	
			</div>

			<div id="logo-bas">
				<div>
					<img src="../img/nutri-a.png">
				</div>

				<div>
					<img src="../img/logo-bio.png">
				</div>
				
				<div>
					<img src="../img/nutri-b.png">
				</div>
			</div>

		</section>

		<footer>
			<?php include("../include/footer.php"); ?>
		</footer>
	</body>
</html>