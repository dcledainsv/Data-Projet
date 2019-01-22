<?php

	$dbn = "mysql:dbname=db769412596;host=127.0.0.1";
	$user = "dcl.edainsv";
	$pass = "TPdev_log";
	
	try
	{
	        $bdd = new PDO($dbn, $user, $pass);
	         // echo "Connecté ";
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}

		// $bdd = new PDO('mysql:host=db769412596.hosting-data.io;dbname=db769412596;charset=utf8', 'dbo769412596', 'AtosAfo18');
	 	// $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

?>


