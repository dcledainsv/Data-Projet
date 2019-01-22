<?php session_start();  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/profil.css">

<title>Mon profil</title>

</head>
<body>

    <header>
    <?php include("../include/header.php"); ?>
    </header>

    <section>
        <div id="titre">
        <h1>Mon Profil</h1>
            <img id= "interro3" src="../img/speech-bubble.png" alt="interrogation"> 
        </div>
        <div id="modal3">
        <h2>Veuillez respecter les consignes suivantes :</h2>
            <ul>
                <li><strong>Nom </strong>et <strong>Prénom</strong> : chiffres et caractères spéciaux non autorisés. </li>
                <li><strong>Mot de passe</strong> : doit comporter au moins une minuscule, une majuscule, un chiffre et un caractère spécial (# ? ! $ % & * -).</li>
                <li>Les deux saisies du mot de passe doivent être identique. </li>
                <li>En cas d'erreur, le champ changera de couleur. </li>
                <li>Tous les champs doivent être complétés pour pouvoir valider votre inscription.</li>
                <li>Vous aurez la possibilité de modifier vos données sur la page 'mon profil' à tout moment.</li>
            </ul>
        </div>       
        <form method="post" action="../request/trtProfil.php" onsubmit="return verifForm()"> 

        <div class="haut">

            <div class="donnee">
                <label for="pseudo">Pseudo *</label> 
                <input type="text" name="newPseudo" value="<?php echo $user['pseudo'];?>" placeholder="pseudo" required>
                </div> 
                <div class="donnee">
                <label for="nom">Nom *</label>
                <input type="text" name="newNom" value="<?php echo $user['nom'];?>" placeholder="nom" onblur="verifNom(this)" required>
                </div> 
                <div class="donnee">
                <label for="prenom">Prénom *</label>
                <input type="text" name="newPrenom" value="<?php echo $user['pseprenomudo'];?>" placeholder="prénom" onblur="verifNom(this)" required >
                </div> 
                <div class="donnee">
                <label for="email">Email *</label>
                <input type="email" name="newEmail" value="<?php echo $user['email'];?>" placeholder="email" onblur="verifMail(this)" required>
                </div> 
                <div class="donnee">
                <label for="motDePasse">Mot de passe *</label>
                <input type="password" name="newMotDePasse" placeholder="mot de passe" onblur="verifPsw(this)" required>
                </div> 
                <div class="donnee">
                <label for="confMotDePasse">Confirmation <br/> du mot de passe * </label>
                <input type="password" name="newConfMotDePasse" placeholder="mot de passe" onblur="verifPsw2(this)" required>
            </div>

        </div>      

        <div class="bas">
            <p class="texte" id="besoins">Pour le calcul de vos besoins journaliers :
            <img id= "interro1" src="../img/speech-bubble.png" alt="interrogation">
            </p>
            <div id="modal1">
                <p>Vos besoins quotidiens en calories dépendent de votre âge, de votre sexe, de votre poids, de votre taille et de votre activité physique.</p>
            </div>
            <div class="donnee">
                <label for="dateDeNaissance">Date de naissance *</label>
                <input type="date" id="dateDeNaissance" value="<?php echo $user['dateDeNaissance'];?>" name="dateDeNaissance" placeholder="dateDeNaissance" required>
            </div>  
            <div id="genre">
                <label id="labgenre"></label>
                <div id="homme">
                <input type="radio" id="homme"  name="sexe" value="1" required>homme
            </div>
            <div id="femme">
                <input type="radio" id="femme"  name="sexe" value="2" required>femme
            </div>
            </div>
            <div class="donnee">
                <label for="taille">Taille (cm) * </label>
                <input type="number" name="newTaille" value="<?php echo $user['taille'];?>" placeholder="taille" min="100" max="250" required>
            </div>
            <div class="donnee">
                <label for="poids">Poids (Kg) * </label>
                <input type="number" name="newPoids" value="<?php echo $user['poids'];?>" placeholder="poids" min="40" max="200" required>
            </div>
            <div class="donnee">
                <label for="activite">Activité * <img id= "interro2" src="../img/speech-bubble.png" alt="interrogation" > </label>
                <div id="modal2">
                <strong>Sédentaire</strong> : vous avez un travail de bureau ou une faible dépense sportive. <br>
                <strong>Légèrement actif</strong> : vous vous entraînez 1 à 3 fois par semaine. <br>
                <strong>Actif</strong> : vous vous entraînez 4 à 6 fois par semaine. <br>
                <strong>Sportif</strong> : vous faites quotidiennement du sport ou des exercices physiques soutenus.
            </div>
            <select name="newActivite" id="activite" >
                <option value="0">Sélectionnez une activité</option>
                <option value="1">Sédentaire</option>
                <option value="2">Légèrement actif</option>
                <option value="3">Actif</option>
                <option value="4">Sportif</option>
            </select> 
        </div>  
            <p class="texte" id="oblig">* données obligatoires</p>
        <div id="accord" >
            <input type="checkbox" name="accord" value="ok" required> <p class="texte" id="accordtext">J'accepte l'enregistrement de mes données.</p>
        </div>    
        </div> 
            <input type="submit" name="modifier" value="Mettre à jour "> 
            <input type="submit" name="supprimer" value="Supprimer mon compte"> 

        </form>
        <div id="reponse">
        <?php
        if (isset($msg))
        {
        echo $msg;
        echo $_SESSION['message'];
        }
        ?>
        </div>
    </section>


<footer>
<?php include("../include/footer.php")?>
</footer>

<script src="../js/inscription.js"></script>
</body>
</html>