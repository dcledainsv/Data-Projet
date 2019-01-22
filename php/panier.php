<?php session_start(); 

// création d'un panier s'il n'existe pas déjà
if (!isset($_SESSION['panier'])){
    $_SESSION['panier']=array();
    $_SESSION['panier']['idProduit'] = array();
    $_SESSION['panier']['nomProduit'] = array();
    $_SESSION['panier']['photoProduit'] = array();
    $_SESSION['panier']['calorieProduit'] = array();
    $_SESSION['panier']['lipidesProduit'] = array();
    $_SESSION['panier']['glucidesProduit'] = array();
    $_SESSION['panier']['proteinesProduit'] = array();
    $_SESSION['panier']['portionProduit'] = array();
    $_SESSION['panier']['qteProduit'] = array();
    $_SESSION['panier']['poidsProduit'] = array();
    $_SESSION['panier']['uniteProduit'] = array();
 }

// vérification présence données
if (isset($_POST['idProduit']) AND
    isset($_POST['nomProduit']) AND
    isset($_POST['photoProduit']) AND
    isset($_POST['calorieProduit']) AND
    isset($_POST['lipidesProduit']) AND
    isset($_POST['glucidesProduit']) AND
    isset($_POST['proteinesProduit']) AND
    isset($_POST['portionProduit']) AND
    isset($_POST['qteProduit']) AND
    isset($_POST['poidsProduit']) AND
    isset($_POST['uniteProduit'])) {

// récupération des données du produit sélectionné sur page produit
        $idProduit = $_POST['idProduit'];
        $nomProduit = $_POST['nomProduit'];
        $photoProduit = $_POST['photoProduit'];
        $calorieProduit = $_POST['calorieProduit'];
        $lipidesProduit = $_POST['lipidesProduit'];
        $glucidesProduit = $_POST['glucidesProduit'];
        $proteinesProduit = $_POST['proteinesProduit'];
        $portionProduit = $_POST['portionProduit'];
        $qteProduit = $_POST['qteProduit'];
        $poidsProduit = $_POST['poidsProduit'];
        $uniteProduit = $_POST['uniteProduit'];

    // echo $idProduit."<br>";
    // echo $nomProduit."<br>";
    // echo $photoProduit."<br>";
    // echo $calorieProduit."<br>";
    // echo $lipidesProduit."<br>";
    // echo $glucidesProduit."<br>";
    // echo $proteinesProduit."<br>";
    // echo $portionProduit."<br>";
    // echo $qteProduit."<br>";
    // echo $poidsProduit."<br>";
    // echo $uniteProduit."<br>";

// insertion des données dans panier
    array_push( $_SESSION['panier']['idProduit'],$idProduit);
    array_push( $_SESSION['panier']['nomProduit'],$nomProduit);
    array_push( $_SESSION['panier']['photoProduit'],$photoProduit);
    array_push( $_SESSION['panier']['calorieProduit'],$calorieProduit);
    array_push( $_SESSION['panier']['lipidesProduit'],$lipidesProduit);
    array_push( $_SESSION['panier']['glucidesProduit'],$glucidesProduit);
    array_push( $_SESSION['panier']['proteinesProduit'],$proteinesProduit);
    array_push( $_SESSION['panier']['portionProduit'],$portionProduit);
    array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
    array_push( $_SESSION['panier']['poidsProduit'],$poidsProduit);
    array_push( $_SESSION['panier']['uniteProduit'],$uniteProduit);
                
      // redirection vers page composition menu
      header ('location: menu.php');      
}
 // var_dump($_SESSION['panier']);

