<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style-inscription.css">
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
                <br><br>
                <input type="text" name="nom" value="<?php echo $nom;?>"placeholder="Nom">
                <br><br>
                <input type="text" name="prenom" value="<?php echo $prenom;?>"placeholder="Prénom">
                <br><br>
                <p>Pour le calcule de votre ........<p>
                <br>
                Date de naissance 
                <br>
                <input type="date" name="dateDeNaissance" value="<?php echo $dateDeNaissance;?>"placeholder="Date de naissance">
                <br><br>
                Sexe:
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="femme") echo "checked";?> value="femme">Femme
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="homme") echo "checked";?> value="homme">Homme
                <span class="error"><?php echo $genderErr;?></span>
                <br><br>
                <input type="number" name="taille" value="<?php echo $taille;?>"placeholder="Taille (cm)">
                <br><br>
                <input type="number" name="poids" value="<?php echo $poids;?>"placeholder="Poids (Kg)">
                <br><br>

                    <select name="Activité">
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

<?php include("./annexes/footer.php") ?>
</body>
</html>