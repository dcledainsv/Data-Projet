<?php
try
{
        $bdd = new PDO('mysql:host=db769412596.hosting-data.io;dbname=db769412596;charset=utf8', 'dbo769412596', 'AtosAfo18');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>