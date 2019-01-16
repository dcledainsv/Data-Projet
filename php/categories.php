<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/categories.css">
        <title>catégories</title>
    </head>

    <body>
        <header>
            <?php include("./../include/header.php"); ?>
        </header>

        <section>
            <h1>Catégories</h1>
            <form action="listeproduits.php" method="get">
                <div class="categorie" id="fruits">
                <h2>Fruits et légumes</h2>
                    <div class="liste">       
                        <ul>
                            <li><input type="button" name="fruits" value="Fruits"></li>
                            <li>Compotes</li>
                            <li>Fruits secs et graines</li>
                            <li>Légumes</li>
                            <li>Légumineuses</li>
                            <li>Farines et pâtes</li>
                            <li>Soja</li>
                            <li>Condiments</li>
                            <li>Pommes de terre</li>
                        </ul>
                    </div>
                </div>
                <div class="categorie" id="cereales">
                <h2>Céréales</h2>
                    <div class="liste">
                        <ul>
                            <li>Pains et biscottes</li>
                            <li>Flocons et mueslis</li>
                            <li>Semoules</li>
                            <li>Pâtes alimentaires</li>
                            <li>Riz</li>
                            <li>Graines et sons</li>
                            <li>Farines de céréales</li>
                        </ul>
                    </div>   
                </div>
                <div class="categorie" id="viandes">
                <h2>Viandes et substituts</h2>
                    <div class="liste">
                        <ul>
                            <li>Tofu/substituts de viandes</li>
                            <li>Oeufs</li>
                            <li>Viandes bovines</li>
                            <li>Viandes de porc</li>
                            <li>Volailles</li>
                            <li>Charcuteries</li>
                            <li>Poissons</li>
                        </ul>
                    </div>
                </div>
                <div class="categorie" id="lait">
                    <h2>Produits laitiers</h2>
                    <div class="liste"> 
                        
                        <ul>
                            <li>Lait</li>
                            <li>Fromages</li>
                            <li>Yaourt</li>
                            <li>Dessert</li>
                        </ul>
                    </div>
                </div>
                <div class="categorie" id="boissons">
                    <h2>Boissons</h2>
                    <div class="liste">
                        
                        <ul>
                            <li>Jus de fruits/légumes</li>
                            <li>Boissons végétales</li>
                            <li>Infusions</li>
                        </ul>
                    </div>  
                </div>
                <div class="categorie" id="presentation">
                    <h2>Présentation</h2>
                    <div class="liste">
                        
                        <ul>
                            <li>Frais</li>
                            <li>Conserves</li>
                            <li>Surgelés</li>
                            <li>Plats préparés</li>
                            <li>Galettes</li>
                            <li>Soupes</li>
                            <li>Sauces</li>
                        </ul>
                    </div>
                </div>
                <div id="favoris">
                    <h2>Mes produits favoris</h2>
                </div>
            </form>
        </section>

        <footer>
            <?php include("./../include/footer.php") ?>
        </footer>

        <script src="../js/produits.js"></script> 
    </body>
</html>