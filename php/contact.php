<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/contact.css">
		<title>Accueil</title>
	</head>

	<body>
		<header>
            <?php include("../include/header.php"); ?>      
        </header>

		<section>
                <form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
                    <div class="contact">
                        <h1>CONTACT</h1>
                        <fieldset><legend></legend>
                        <input type='text' name='nom' id='nom' maxlength='30' placeholder="NOM *" required>
                        <input type='text' name='prenom' id='prenom' maxlength='30' placeholder="PRÉNOM *" required>   
                        <input type='email' name='email' id='email' maxlength='30' placeholder="EMAIL *" required>
                        <input type='telephone' name='telephone' id='telephone' maxlength='10' placeholder="TELEPHONE *" required>
                        <input type='postal' name='postal' id='postal' maxlength='5' placeholder="CODE POSTAL *" required>
                        <input type='town' name='ville' id='ville' maxlength='30' placeholder="VILLE *" required>
                        </fieldset>
                        <input type='objet' name='objet' id='objet' maxlength='1000' placeholder="OBJET *" required>
                        <textarea name='message' id='message' placeholder="Message *"></textarea>
                        <input type="submit" value="Envoyer"><input type="reset">
                    </div>    
                </form>
                <?php
                    // S'il y des données de postées
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                    
                    // (1) Code PHP pour traiter l'envoi de l'email
                    
                    // Récupération des variables et sécurisation des données
                    $nom     = htmlentities($_POST['nom']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
                    $prenom   = htmlentities($_POST['prenom']);
                    $email   = htmlentities($_POST['email']);
                    $telephone   = htmlentities($_POST['telephone']);
                    $postal   = htmlentities($_POST['postal']);
                    $ville   = htmlentities($_POST['ville']);
                    $objet   = htmlentities($_POST['objet']);
                    $message = htmlentities($_POST['message']);
                    
                    // Variables concernant l'email
                    
                    $destinataire = 'laurent.juy@gmail.com'; // Adresse email du webmaster (à personnaliser)
                    $sujet = 'Titre du message'; // Titre de l'email
                    $contenu = '<html><head><title>Titre du message</title></head><body>';
                    $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
                    $contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
                    $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
                    $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
                    $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)
                    
                    // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
                    $headers = 'MIME-Version: 1.0'."\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                    
                    // Envoyer l'email
                    mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
                    echo '<h2>Message envoyé!</h2>'; // Afficher un message pour indiquer que le message a été envoyé
                    // (2) Fin du code pour traiter l'envoi de l'email
                    }
                ?>
		</section>

		<?php include("../include/footer.php") ?>
	</body>
</html>