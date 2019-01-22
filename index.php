<?php
	session_start();

<<<<<<< HEAD
	<body>
		<header>
			<a href="index.php"><img src="img/logo-bio-miam-horizon.png" alt="Titre du site et logo" class="logo-header"></a>

			<nav>
				<ul>
					<li>
						<img src="img/menu-hamburger.png" class="menu-hamb-logo">
						
						<ul class="submenu">
							<li><a href="index.php">Accueil</a></li>
							<li><a href="">Mon Profil</a></li>
							<li><a href="php/menu-day.php">Mes Menus</a></li>
							<li><a href="php/categories.php">Produits</a></li>
							<li><a href="php/blog.php">Blog</a></li>
							<li><a href="php/contact-phpmailer.php">Contact</a></li>
						</ul>		
					</li>
				</ul>

				<div id="login">
					<p>Connexion / <br/>Inscription</p>
				</div>
			</nav>
		</header>
		
		<section>
			<div>
				<img src="img/ferme.png" alt="Bannière d'image du site" class="image-banner">
			</div>


			<div>
				<p>Bienvenue sur <img src="img/logo-web.png" alt="logo-biomiam" class="logo-web-paragraph">, un site pour vous aider à concevoir votre menu du jour à partir de produits Bio, d'origine française avec les meilleures notes nutritionnelles (nutri-score A et B).</p>	
			</div>

			<div id="logo-bas">
				<div>
					<img src="img/nutri-a.png">
				</div>

				<div>
					<img src="img/logo-bio.png">
				</div>
				
				<div>
					<img src="img/nutri-b.png">
				</div>
			</div>
		</section>

		<footer>
			<p>
				Copyright &copy; - 
				<a href="php/mentionslegales.php">Mentions Légales</a> -
				<a href="">A propos</a>
			</p>
		</footer>

		<!-- If clic inscription => Modale -->
		<div id="modaleLog">
			<div id="log">
				<form>
					<label for="nomUtilisateur">Nom d'utilisateur : </label> <br />
					<input type="text" name="" id="nomUtilisateur">

					<label for="nomUtilisateur">Mot de passe : </label> <br />
					<input type="password" name="" id="nomUtilisateur"> <br />

					<div>
						<input type="submit" name="subm" value="Connexion">
					</div>
				</form>
				
				<div>
					<a href="php/formulaireInscription.php">Créer un compte ?</a>
				</div>
			</div>
		</div>
		<!-- End Modale -->
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
=======
	header("Location: php/accueil.php");
?>
>>>>>>> edains
