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
           
            <form method="post" action="#"> 
                <div class="haut"> 
                    <input type="text" class="input" name="pseudo" value="<?php echo $pseudo;?>" placeholder="Pseudo">
                    <input type="password" class="input" name="motDePasse" value="<?php echo $motDePasse;?>"placeholder="Mot de passe">
                    <input type="password" class="input" name="confMotDePasse" value="<?php echo $confMotDePasse;?>"placeholder="Confirmez votre mot de passe">
                    <input type="mail" class="input" name="email" value="<?php echo $email;?>"placeholder="Email">
                    <input type="text" class="input" name="nom" value="<?php echo $nom;?>"placeholder="Nom">
                    <input type="text" class="input" name="prenom" value="<?php echo $prenom;?>"placeholder="Prénom">
                </div>

                <div class="texte">
                    <p>Pour le calcule de votre AJR il nous faut ces informations complétmentaires</p>
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
                    <select class="input" name="activite">
                        <option>Sélectionnez une activité</option>
                        <option>Sédentaire</option>
                        <option>Légèrement actif</option>
                        <option>Actif</option>
                        <option>Sportif</option>
                    </select>                
                </div>       
                <input type="submit" class="input" name="jeMinscris" value="Je m'inscris"> 
            </form>
        </section>

    <?php
    // définir les variables avec des valeurs vides
    $pseudoErr = $motDePasseErr = $confMotDePasseErr = $emailErr = $nomErr = $prenomErr = $dateDeNaissanceErr = $sexeErr = $tailleErr = $poidsErr = $activite = "";
    $pseudo = $motDePasse = $confMotDePasse = $email = $nom = $prenom = $dateDeNaissance = $sexe = $taille = $poids = $activite = "";

    if (isset($_POST["jeMinscris"]))
    {
        if (empty($_POST["pseudo"]))
        {
            echo "Le pseudo est requis" . "<br />"; // Champ vide
        }
        else
        {
            $pseudo = test_input($_POST["pseudo"]);
            // vérif si le nom ne contient que des lettres et des espaces
            if (!preg_match("/^[a-zA-Z ]*$/",$pseudo))
            {
            echo "Seules les lettres et les espaces sont autorisés"; 
            }
        } 

        if (empty($_POST["motDePasse"]))
        {
            echo "Le mot de passe est requis" . "<br />"; // Champ vide
        }
        else
        {
            $motDePasse = test_input($_POST["motDePasse"]);
            // vérif si le mot de passe contient majuscule, minuscule, chiffre, et caractères spéciaux
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)/", $motDePasse))
            {
                echo "Mot de passe non conforme, doit contenir une majuscule, minuscule, chiffre, et caractères spéciaux"; 
            }
        }

        if (empty($_POST["confMotDePasse"]))
        {
            echo "La confirmation du mot de passe est requiss" . "<br />"; // Champ vide
        }
        else
        {
            $confMotDePasse= test_input($_POST["confMotDePasse"]);
            // vérif si mot de passe identique 
            if ( $_POST["confMotDePasse"] != $_POST["motDePasse"])
            {
                echo "Les 2 mots de passe sont différents !"; 
            }
        }

        if (empty($_POST["email"]))
        {
            echo "L'adresse email est requise" . "<br />"; // Champ vide
        }
        else
        {
            $email = test_input($_POST["email"]);
            // Vérif format email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo "Adresse email invalide !"; 
            }
        }

        if (empty($_POST["nom"]))
        {
            echo "Le nom est requis !" . "<br />"; // Champ vide
        }
        else
        {
            $nom = test_input($_POST["nom"]);
            // vérif si le nom ne contient que des lettres et des espaces
            if (!preg_match("/^[a-zA-Z ]*$/",$nom))
            {
            $nomErr = "Seules les lettres et les espaces sont autorisés !"; 
            }
        }

        if (empty($_POST["prenom"]))
        {
            echo "Le prenom est requis !" . "<br />"; // Champ vide
        }
        else
        {
            $prenom = test_input($_POST["prenom"]);
            // vérif si le prenom ne contient que des lettres et des espaces
            if (!preg_match("/^[a-zA-Z ]*$/",$prenom))
            {
                echo "Seules les lettres et les espaces sont autorisés !"; 
            }
        }

        if (empty($_POST["dateDeNaissance"]))
        {
            echo "La date de naissance est requise !" . "<br />"; // Champ vide
        }
        else
        {
            $dateDeNaissance = test_input($_POST["dateDeNaissance"]);
        }

        if (empty($_POST["sexe"]))
        {
            echo "Le sexe est requis" . "<br />"; // Champ vide
        }
        else
        {
            $sexe = test_input($_POST["sexe"]);
        }

        if (empty($_POST["taille"]))
        {
            echo "Votre taille est requise !" . "<br />"; // Champ vide
        }
        else
        {
            $taille = test_input($_POST["taille"]);
            // vérif si le champs ne contient que des chiffres
            if (!preg_match("/^[[0-9]/",$taille))
            {
                echo "Votre tailles en cm est requise !"; 
            }
        }

        if (empty($_POST["poids"]))
        {
            echo "Votre poids est requise !" . "<br />"; // Champ vide
        }
        else
        {
            $poids = test_input($_POST["poids"]);
            // vérif si le champs ne contient que des chiffres
            if (!preg_match("/^[[0-9]/",$poids))
            {
                echo "Votre poids en kg est requis !" . "<br/>";  // Champ vide
            }
        }

        if (isset($_POST['activite']))
        {
            $activite = $_POST['activite'];

            switch($activite)
            {
                case 'Sédentaire':
                    echo $activite;
                    break;
                case 'Légèrement actif':
                    echo $activite;
                    break;
                case 'Actif':
                    echo $activite;
                    break;
                case 'Sportif':
                    echo $activite;
                    break;
                default:
                    echo "Veuillez renseigner votre activité" . "<br />";  // Champ vide
                    break;
            }
        }
    }    

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <!-- vérif récupération -->
    <?php
        // echo $pseudo;
        // echo "<br>";
        // echo "Mot de passe crypté"; // echo $motDePasse;
        // echo "<br>";
        // echo "Mot de passe crypté (confirmation)"; // echo $confMotDePasse;
        // echo "<br>";
        // echo $email;
        // echo "<br>";
        // echo $nom;
        // echo "<br>";
        // echo $prenom;
        // echo "<br>";
        // echo $dateDeNaissance;
        // echo "<br>";
        // echo $sexe;
        // echo "<br>";
        // echo $taille;
        // echo "<br>";
        // echo $poids;
        // echo "<br>";
        // echo $choix;

    ?>

    <footer>
        <?php include("../include/footer.php")?>
    </footer>

    </body>
</html>