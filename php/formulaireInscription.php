<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/inscription.css">

		<title>Formulaire d'inscription</title>
	</head>
	<body>

		<header>
			<?php include("../include/header.php"); ?>
		</header>
		
		<section>
            <h2>Informations personnelles</h2>
                <div class="haut">
                    <form method="post" action="#">  
                        <input type="text" class="input" name="pseudo" value="<?php echo $pseudo;?>" placeholder="Pseudo">
                        <input type="text" class="input" name="motDePasse" value="<?php echo $motDePasse;?>"placeholder="Mot de passe">
                        <input type="text" class="input" name="confMotDePasse" value="<?php echo $confMotDePasse;?>"placeholder="Confirmez votre mot de passe">
                        <input type="mail" class="input" name="email" value="<?php echo $email;?>"placeholder="Email">
                        <input type="text" class="input" name="nom" value="<?php echo $nom;?>"placeholder="Nom">
                        <input type="text" class="input" name="prenom" value="<?php echo $prenom;?>"placeholder="Prénom">
                </div>
                <div class="texte">
                Pour le calcule de votre ........ il nous faut ces informations complétmentaires
                </div>
                <div class="bas">
                        <label for="dateDeNaissance">Date de naissance</label>
                        <input type="date" class="input" id="dateDeNaissance" name="dateDeNaissance" value="<?php echo $dateDeNaissance;?>"placeholder="Date de naissance">
                        <label for="femme">Femme</label>
                        <input type="radio" id="femme" class="radio" name="sexe" <?php if (isset($sexe) && $sexe=="femme") echo "checked";?> value="femme">
                        <label for="homme">Homme</label>
                        <input type="radio" id="homme" class="radio" name="sexe" <?php if (isset($sexe) && $sexe=="homme") echo "checked";?> value="homme">
                        <input type="number"  class="input" name="taille" value="<?php echo $taille;?>"placeholder="Taille (cm)">
                        <input type="number"  class="input" name="poids" value="<?php echo $poids;?>"placeholder="Poids (Kg)">
                        <select class="input"name="activite" >
                            <option value="Activité"  >Sélectionnez une activité</option>
                            <option value="Sédentaire" >Sédentaire</option>
                            <option value="Légèrement actif" >Légèrement actif</option>
                            <option value="Actif" >Actif</option>
                            <option value="Sportif" >Sportif</option>
                        </select>                
                </div>       
                        <input type="submit" class="input" name="jeMinscris" value="Je m'inscris"> 
                    </form>
        </section>
        
        <?php
// définir les variables avec des valeurs vides
$pseudoErr = $motDePasseErr = $confMotDePasseErr = $emailErr = $nomErr = $prenomErr = $dateDeNaissanceErr = $sexeErr = $tailleErr = $poidsErr = $activite = "";
$pseudo = $motDePasse = $confMotDePasse = $email = $nom = $prenom = $dateDeNaissance = $sexe = $taille = $poids = $activite = "";

if (isset($_POST["jeMinscris"])) {
  if (empty($_POST["pseudo"])) {
    $pseudoErr = "Le pseudo est requis";
  } else {
    $pseudo = test_input($_POST["pseudo"]);
    // vérif si le nom ne contient que des lettres et des espaces
    if (!preg_match("/^[a-zA-Z ]*$/",$pseudo)) {
      $pseudoErr = "Seules les lettres et les espaces sont autorisés"; 
    }
  }
  if (empty($_POST["motDePasse"])) {
    $motDePasseErr = "Le mot de passe est requis";
  } else {
    $motDePasse = test_input($_POST["motDePasse"]);
    // vérif si le mot de passe contient majuscule, minuscule, chiffre, et caractères spéciaux
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)/", $motDePasse)) {
      $motDePasseErr = "Mot de passe non conforme, doit contenir une majuscule, minuscule, chiffre, et caractères spéciaux"; 
    }
  }
  
  if (empty($_POST["confMotDePasse"])) {
    $confMotDePasseErr = "La confirmation du mot de passe est requis";
  } else {
    $confMotDePasse= test_input($_POST["confMotDePasse"]);
    // vérif si mot de passe identique 
    if ( $_POST["confMotDePasse"] != $_POST["motDePasse"]) {
      $motDePasseErr = "Les 2 mots de passe sont différents !"; 
    }
  }
    
  if (empty($_POST["email"])) {
    $emailErr = "L'adresse email est requise";
  } else {
    $email = test_input($_POST["email"]);
    // Vérif format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Adresse email invalide !"; 
    }
  }
  
  if (empty($_POST["nom"])) {
    $nomErr = "Le nom est requis !";
  } else {
    $nom = test_input($_POST["nom"]);
    // vérif si le nom ne contient que des lettres et des espaces
    if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
      $nomErr = "Seules les lettres et les espaces sont autorisés !"; 
    }
  }

  if (empty($_POST["prenom"])) {
    $prenomErr = "Le prenom est requis !";
  } else {
    $prenom = test_input($_POST["prenom"]);
    // vérif si le prenom ne contient que des lettres et des espaces
    if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
      $prenomErr = "Seules les lettres et les espaces sont autorisés !"; 
    }
  }

  if (empty($_POST["dateDeNaissance"])) {
    $dateDeNaissanceErr = "La date de naissance est requise !";
  } else {
    $dateDeNaissance = test_input($_POST["dateDeNaissance"]);
  
  if (empty($_POST["sexe"])) {
    $sexeErr = "Le sexe est requis";
  } else {
    $sexe = test_input($_POST["sexe"]);
  }

  if (empty($_POST["taille"])) {
    $tailleErr = "Votre taille est requise !";
  } else {
    $taille = test_input($_POST["taille"]);
    // vérif si le champs ne contient que des chiffres
    if (!preg_match("/^[[0-9]/",$taille)) {
    $tailleErr = "Votre tailles en cm est requise !"; 
    }
  }

  if (empty($_POST["poids"])) {
    $poidsErr = "Votre poids est requise !";
  } else {
    $poids = test_input($_POST["poids"]);
    // vérif si le champs ne contient que des chiffres
    if (!preg_match("/^[[0-9]/",$poids)) {
    $poidsErr = "Votre poids en kg est requis !"; 
    }
  }

  if (isset($_POST["activite"])){
    $choix = $_POST["activite"];
    if ($choix=="sedentaire"){
      echo ("Sédentaire");
    }
    if ($choix=="legerementActif"){
      echo ("Légèrement actif");
    }
    if ($choix=="actif"){
      echo ("Actif");
    }
    if ($choix=="sportif"){
      echo ("Sportif");
    }
  }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!-- vérif récupération -->
<?php
    echo $pseudo;
    echo "<br>";
    echo $motDePasse;
    echo "<br>";
    echo $confMotDePasse;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $nom;
    echo "<br>";
    echo $prenom;
    echo "<br>";
    echo $dateDeNaissance;
    echo "<br>";
    echo $sexe;
    echo "<br>";
    echo $taille;
    echo "<br>";
    echo $poids;
    echo "<br>";
    echo $choix;
?>

<footer>
  <?php include("../include/footer.php")?>
</footer>

</body>
</html>