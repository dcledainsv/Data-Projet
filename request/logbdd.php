<?php
	// function connectBdd()
	// {
		$dbn = "mysql:dbname=BioMiam;host=127.0.0.1";
		$user = "sylvieg";
		$pass = "MySQL_gs18";

		try
		{
			$bdd = new PDO($dbn, $user, $pass);	
		}
		catch (PDOException $e)
		{
			echo "Connexion à la base de donnée échouée : " . $e->getMessage();
		}

	// 	return $bdd;
	// }
?>