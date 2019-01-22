<?php session_start(); ?>
<<<<<<< HEAD

=======
>>>>>>> edains
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/categories.css">
    <title>catégories</title>
</head>
<body>

<header>
    <?php include("../include/header.php"); ?>
</header>

<section>
    <h1>Catégories</h1>
    <form action="listeproduits.php" method="get">
        <div id="favoris">
            <h2>Mes produits favoris</h2>
        </div>
        <div class="categorie" id="fruitleg">
        <h2>Fruits et légumes</h2>
            <div class="liste">       
                <ul>
                    <li id="cat11">Fruits</li>
                    <li id="cat3">Compotes</li>
                    <li id="cat12">Fruits secs et graines</li>
                    <li id="cat18">Légumes</li>
                    <li id="cat19">Légumineuses</li>
                    <li id="cat37">Farines et pâtes</li>
                    <li id="cat30">Soja</li>
                    <li id="cat4">Condiments</li>
                    <li id="cat25">Pommes de terre</li>
                </ul>
            </div>
        </div>
        <div class="categorie" id="cereales">
        <h2>Céréales</h2>
            <div class="liste">
                <ul>
                    <li id="cat21">Pains et biscottes</li>
                    <li id="cat8">Flocons et mueslis</li>
                    <li id="cat29">Semoules</li>
                    <li id="cat22">Pâtes alimentaires</li>
                    <li id="cat27">Riz</li>
                    <li id="cat14">Graines et sons</li>
                    <li id="cat7">Farines de céréales</li>
                </ul>
            </div>   
        </div>
        <div class="categorie" id="viandes">
        <h2>Viandes et substituts</h2>
            <div class="liste">
                <ul>
                    <li id="cat33">Tofu/substituts de viandes</li>
                    <li id="cat20">Oeufs</li>
                    <li id="cat34">Viandes bovines</li>
                    <li id="cat26">Viandes de porc</li>
                    <li id="cat35">Volailles</li>
                    <li id="cat2">Charcuteries</li>
                    <li id="cat24">Poissons</li>
                </ul>
            </div>
        </div>
        <div class="categorie" id="lait">
            <h2>Produits laitiers</h2>
            <div class="liste"> 
                
                <ul>
                    <li id="cat17">Lait</li>
                    <li id="cat10">Fromages</li>
                    <li id="cat36">Yaourt</li>
                    <li id="cat6">Dessert</li>
                </ul>
            </div>
        </div>
        <div class="categorie" id="boissons">
            <h2>Boissons</h2>
            <div class="liste">
                
                <ul>
                    <li id="cat16">Jus de fruits/légumes</li>
                    <li id="cat1">Boissons végétales</li>
                    <li id="cat15">Infusions</li>
                </ul>
            </div>  
        </div>
        <div class="categorie" id="presentation">
            <h2>Présentation</h2>
            <div class="liste">
                
                <ul>
                    <li id="cat9">Frais</li>
                    <li id="cat5">Conserves</li>
                    <li id="cat32">Surgelés</li>
                    <li id="cat23">Plats préparés</li>
                    <li id="cat13">Galettes</li>
                    <li id="cat31">Soupes</li>
                    <li id="cat28">Sauces</li>
                </ul>
            </div>
        </div>
        
    </form>
</section>

<footer>
    <?php include("../include/footer.php") ?>
</footer>
   <script src="../js/catprod.js"></script> 
</body>
</html>