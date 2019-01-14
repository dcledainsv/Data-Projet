<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style-inscription.css">
    <link rel="stylesheet" href="style.css">

    <title>Inscription</title>
</head>
<body>
<?php include("./annexes/header.php"); ?>

    <section>
        <h1>Informations personnelles</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <input type="text" name="pseudo" value="<?php echo $pseudo;?>" placeholder="Pseudo">
                <span class="error"><?php echo $pseudoErr;?></span>
                <br><br>
                <input type="text" name="motDePasse" value="<?php echo $motDePasse;?>"placeholder="Mot de passe">
                <span class="error"><?php echo $motDePasseErr;?></span>
                <br><br>
                <input type="text" name="confMotDePasse" value="<?php echo $confMotDePasse;?>"placeholder="Confirmez votre mot de passe">
                <span class="error"><?php echo $confMotDePasseErr;?></span>
                <br><br>
                <input type="mail" name="email" value="<?php echo $email;?>"placeholder="Email">
                <span class="error"><?php echo $emailErr;?></span>
                <br><br>
                <input type="text" name="nom" value="<?php echo $nom;?>"placeholder="Nom">
                <span class="error"><?php echo $nomErr;?></span>
                <br><br>
                <input type="text" name="prenom" value="<?php echo $prenom;?>"placeholder="Prénom">
                <span class="error"><?php echo $prenomErr;?></span>
                <br><br>
                <p>Pour le calcule de votre ........<p>
                <br>
                Date de naissance 
                <br>
                <input type="date" name="dateDeNaissance" value="<?php echo $dateDeNaissance;?>"placeholder="Date de naissance">
                <span class="error"><?php echo $dateDeNaissanceErr;?></span>
                <br><br>
                Sexe:
                <input type="radio" name="sexe" <?php if (isset($sexe) && $sexe=="femme") echo "checked";?> value="femme">Femme
                <span class="error"><?php echo $sexeErr;?></span>
                <input type="radio" name="sexe" <?php if (isset($sexe) && $sexe=="homme") echo "checked";?> value="homme">Homme
                <span class="error"><?php echo $sexeErr;?></span>
                <br><br>
                <input type="number" name="taille" value="<?php echo $taille;?>"placeholder="Taille (cm)">
                <span class="error"><?php echo $tailleErr;?></span>
                <br><br>
                <input type="number" name="poids" value="<?php echo $poids;?>"placeholder="Poids (Kg)">
                <span class="error"><?php echo $poidsErr;?></span>
                <br><br>
                <select name="activite">
                    <option value="">Activité</option>
                    <option value="sedentaire">Sédentaire</option>
                    <option value="legerementActif">Légèrement actif</option>
                    <option value="actif">Actif</option>
                    <option value="sportif">Sportif</option>
                </select>                
                <br><br>
                <input type="submit" name="jeMinscris" value="Je m'inscris"> 
                <br><br> 
            </form>
    </section>

    <?php
// définir les variables avec des valeurs vides
$pseudoErr = $motDePasseErr = $confMotDePasseErr = $emailErr = $nomErr = $prenomErr = $dateDeNaissanceErr = $sexeErr = $tailleErr = $poidsErr = $activite = "";
$pseudo = $motDePasse = $confMotDePasse = $email = $nom = $prenom = $dateDeNaissance = $sexe = $taille = $poids = $activite = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

  if (empty($_POST["activite"])) {
    $activiteErr = "Votre activité est requise !";
  } else {
    $sactivite = test_input($_POST["activite"]);
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
    echo $activite;
?>

<?php include("./annexes/footer.php") ?>
</body>
</html>