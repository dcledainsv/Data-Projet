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
                    require('../PHPMailer/class.phpmailer.php'); 

                    // S'il y des données de postées
                    if ($_SERVER['REQUEST_METHOD']=='POST') {

                        // (1) Code PHP pour traiter l'envoi de l'email

                        // Récupération des variables et sécurisation des données
                        $nom     = $_POST['nom']; 
                        $prenom   = $_POST['prenom'];
                        $email   = htmlentities($_POST['email']);// htmlentities() convertit des caractères "spéciaux" en équivalent HTML
                        $telephone   = htmlentities($_POST['telephone']);
                        $postal   = htmlentities($_POST['postal']);
                        $ville   = $_POST['ville'];
                        $objet   = $_POST['objet'];
                        $message = htmlentities($_POST['message']);

                        // Variables concernant l'email
                        
                        $mail = new PHPMailer();
                        $mail->Host = 'smtp.domaine.fr';
                        $mail->SMTPAuth   = false;
                        $mail->Port = 25; // Par défaut

                        // Authentification
                        // $mail->Username = "adresse@domaine.com";
                        // $mail->Password = "motdepasse";

                            // Expéditeur
                        $mail->SetFrom($email, $prenom.' '. $nom);
                        // Destinataire
                        $mail->AddAddress('dcl.laurentj@18pixel.fr', 'JUY Laurent');
                        // Objet
                        $mail->Subject = $objet;

                        // Votre message

                        $bodyMessage='<p>Bonjour, vous avez reçu un message à partir de votre site web <img src="http://sicca-area.com/Aformac-dev/BioMiam/img/mini-logo-web.png" alt="Bio Miam">.</p>';
                        $bodyMessage .='<p>Nom : '.$prenom.' '.$nom.'</p></br>';
                        $bodyMessage .='<p>Telephone : '.$telephone.'</p></br>';
                        $bodyMessage .='<p>'.$postal.' '.$ville.'</p></br>';
                        $bodyMessage .='<p>'.$message.'</p>';

                        $mail->MsgHTML($bodyMessage);

                        

                        

                        // Modifier l'encodage du mail
                        $mail->CharSet = "utf-8";
                            
                        // Envoi du mail avec gestion des erreurs
                        if(!$mail->Send()) {
                            echo 'Erreur : ' . $mail->ErrorInfo;
                        } else {
                            echo 'Message envoyé !';
                        }
                    }
                ?>
		</section>

		<footer>
            <?php include("../include/footer.php") ?>      
        </footer>
	</body>
</html>