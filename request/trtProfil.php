<?php
session_start();

// connection à la base de données
include("logbdd.php"); 


// requête pour sélectionner les infos de l'utilisateur connecté 
if (isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM MEMBRES WHERE id = ? ");
    $requser->execute(array($_SESSION['pseudo']));
    $user = $requser->fetch();

    if(isset($_POST['newPseudo']) AND !empty($_POST ['newPseudo']) AND $_POST['newPseudo'] != $user['pseudo'] );
    {   
        $newPseudo = htmlspecialchars($_POST['newPseudo']);
        $insertpseudo = $bdd->prepare("UPDATE MEMBRES SET pseudo = ? WHERE id = ?");
        $insertpseudo-> execute(array($newPseudo, $_SESSION['id']));
        header('Location:profil.php?id='.$_SESSION['pseudo']);
    }

    if(isset($_POST['newPrenom']) AND !empty($_POST ['newPrenom']) AND $_POST['newPrenom'] != $user['prenom'] );
    {   
        $newPrenom = htmlspecialchars($_POST['newPrenom']);
        $insertprenom = $bdd->prepare("UPDATE MEMBRES SET prenom = ? WHERE id = ?");
        $insertprenom-> execute(array($newPrenom, $_SESSION['id']));
        header('Location:profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newNom']) AND !empty($_POST ['newNom']) AND $_POST['newNom'] != $user['nom'] );
    {   
        $newNom = htmlspecialchars($_POST['newNom']);
        $insertNom = $bdd->prepare("UPDATE MEMBRES SET nom = ? WHERE id = ?");
        $insertNom-> execute(array($newNom, $_SESSION['id']));
        header('Location:profil.php?id='.$_SESSION['id']);
    }

    if (isset($_POST['newMotDePasse']) AND !empty($_POST ['newMotDePasse']) AND isset($_POST['newConfMotDePasse']) AND !empty($_POST ['newConfMotDePasse']));
    {   
        $motDePasse = sha1($_POST['newMotDePasse']);
        $ConfMotDePasse = sha1($_POST['newConfMotDePasse']);
        
        if ($motDePasse == $ConfMotDePasse)
        {
            $insertmotDePasse = $bdd->prepare("UPDATE MEMBRES SET motDePasse  = ? WHERE id = ?");
            $insertmotDePasse-> execute(array($motDePasse, $_SESSION['id']));
            header('Location:profil.php?id='.$_SESSION['id']);
        }
        else
        {
            $msg = "Les mots de passe sont différents !!!";
        }
    }
    if(isset($_POST['newEmail']) AND !empty($_POST ['newEmail']) AND $_POST['newEmail'] != $user['email'] );
    {   
        $newEmail = htmlspecialchars($_POST['newEmail']);
        $insertemail = $bdd->prepare("UPDATE MEMBRES SET email = ? WHERE id = ?");
        $insertemail-> execute(array($newEmail, $_SESSION['id']));
        header('Location:profil.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newTaille']) AND !empty($_POST ['newTaille']) AND $_POST['newTaille'] != $user['taille'] );
    {   
        $newTaille = htmlspecialchars($_POST['newTaille']);
        $inserttaille = $bdd->prepare("UPDATE MEMBRES SET taille = ? WHERE id = ?");
        $inserttaille-> execute(array($newTaille, $_SESSION['id']));
        header('Location:profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newPoids']) AND !empty($_POST ['newPoids']) AND $_POST['newPoids'] != $user['poids'] );
    {   
        $newPoids = htmlspecialchars($_POST['newPoids']);
        $insertpoids = $bdd->prepare("UPDATE MEMBRES SET poids = ? WHERE id = ?");
        $insertpoids-> execute(array($newPoids, $_SESSION['id']));
        header('Location:profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newActivite']) AND !empty($_POST ['newActivite']) AND $_POST['newActivite'] != $user['activite'] );
    {   
        $newActivite = htmlspecialchars($_POST['newActivite']);
        $insertactivite = $bdd->prepare("UPDATE MEMBRES SET activite = ? WHERE id = ?");
        $insertactivite-> execute(array($newActivite, $_SESSION['id']));
        header('Location:profil.php?id='.$_SESSION['id']);
    }
}
else 
{
    header("location: inscription.php");
}

?>