<?php
	session_start();

	include("../request/logbdd.php");

	if (isset($_GET['id']))
	{
		$getId = intval($_GET['id']);

		$reqUser = $bdd->prepare("SELECT * FROM MEMBRES WHERE id_membre = ?");
		$reqUser->execute(array($getId));
		$userInfo = $reqUser->fetch();
	}

	// Selon l'utilisateur
	if (isset($_SESSION['id']) AND $userInfo['id_membre'] == $_SESSION['id'])
	{
		$log = $userInfo['pseudo_membre'] . ' <a href="../request/deco.php">Deconnexion</a>';
		$lienAccueil = "accueil.php?id=" . $_SESSION['id'];
	}
	else
	{
		$log = '<a href="login.php">Connexion / Inscription</a>';
		$lienAccueil = "accueil.php";
	}

?>
<a href="../index.php"><img src="./../img/logo-bio-miam-horizon.png" alt="Titre du site et logo" class="logo-header"></a>

<nav>
	<ul>
		<li>
			<img src="./../img/menu-hamburger.png" class="menu-hamb-logo">
			
			<ul class="submenu">
<<<<<<< HEAD
				<li><a href="../index.php">Accueil</a></li>
				<li><a href="">Mon Profil</a></li>
				<li><a href="../php/menu-day.php">Mes Menus</a></li>
				<li><a href="../php/categories.php">Produits</a></li>
				<li><a href="../php/blog.php">Blog</a></li>
				<li><a href="../php/contact-phpmailer.php">Contact</a></li>
=======
				<li><a href="<?php echo $lienAccueil; ?>">Accueil</a></li>
				<li><a href="<?php echo '//'; ?>">Mon Profil</a></li>
				<li><a href="menu-day.php">Mes Menus</a></li>
				<li><a href="categories.php">Produits</a></li>
				<li><a href="">Blog</a></li>
				<li><a href="contact-phpmailer.php">Contact</a></li>
>>>>>>> edains
			</ul>		
		</li>

	</ul>

	<span><?php echo $log; ?></span>
</nav>
