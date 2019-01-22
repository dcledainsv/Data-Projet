<?php
	session_start();

	include("../request/logbdd.php");

	if (isset($_POST['formConnexion']))
	{
		$pseudoUser = htmlspecialchars($_POST['pseudo']);
		$passwordUser = ($_POST['password']);

		if (!empty($pseudoUser) && !empty($passwordUser))
		{
			$reqUser = $bdd->prepare("SELECT * FROM MEMBRES WHERE pseudo_membre = ? AND password_membre = ?");
			$reqUser->execute(array($pseudoUser, $passwordUser));
			$userExist = $reqUser->rowCount();

			if ($userExist === 1)
			{
				$userInfo = $reqUser->fetch();
				$_SESSION['id'] = $userInfo['id_membre'];
				$_SESSION['pseudo'] = $userInfo['pseudo_membre'];
				$_SESSION['password'] =$userInfo['password_membre'];
				header("Location: accueil.php?id=" . $_SESSION['id']);
			}
			else
			{
				$message = "Vos identifiants sont incorrects !";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/accueil.css">
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<title>Connexion / Inscription</title>
	</head>

	<body>
		<header>
			<?php include("../include/header.php"); ?>
		</header>

		<section>
			<h1>Connexion</h1>

			<!-- INSCRIPTION-->
			<div id="log">
				<form action="" method="post">
					<label for="nomUtilisateur">Pseudo : </label> <br />
					<input type="text" name="pseudo" required="">

					<label for="motDePasse">Mot de passe : </label> <br />
					<input type="password" name="password" required> <br />

					<div>
						<input type="submit" name="formConnexion" value="Connexion">
					</div>
				</form>
				
				<div>
					<a href="inscription.php">Créer un compte ?</a>
				</div>

				<?php echo "<p>" . $message . "</p>"; ?>
			</div>
		</section>

		<footer>
			<?php include("../include/footer.php"); ?>
		</footer>
	</body>
</html>

