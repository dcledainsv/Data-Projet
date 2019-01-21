<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <link rel="stylesheet" href="../css/style.css">
	    <link rel="stylesheet" href="../css/blog.css">
	    <title>Menu du jour</title>
	</head>

	<body>
		<header>
			<?php 
			include("../include/header.php");
			?>
		</header>
		
		<section>
            <div class="titre">Votre assiette santé</div>
            <div><img class="eau" src="../img/assiette.jpg"></div>

            <div class="cereales">
                <div><img id="imgCereale" src="../img/cereales.jpg"></div>
                <div><p class="float"><img src="../img/icone-plus.png"></p><p>Variez les céréales complètes (pâtes complètes, riz complet, riz sauvage, quinoa...) et les légumineuses 
                    (pois chiches, lentilles, pois cassés, haricots...)</p>
                    <p class="float"><img src="../img/icone-moins.png"></p><p>Limitez les céréales raffinées, les farines raffinées et le pain blanc</p>   
                </div>
            </div>
            <div class="proteine">
                <div><img id="imgProteine" src="../img/proteine.jpg"></div>
                <div><p class="float"><img src="../img/icone-plus.png"></p><p>Jongler entre viande blanche, poisson, légumineuses et oeufs.</p>
                    <p class="float"><img src="../img/icone-moins.png"></p><p>Manger le moins possible de viande rouge et de charcuterie (max. deux fois par semaine).</p>   
                </div>
            </div>
            <div class="legume">
                <div><img id="imgLegume" src="../img/legume.jpg"></div>
                <div><p class="float"><img src="../img/icone-plus.png"></p><p>Melangez et variez les légumes, plus il y a de couleurs, plus c'est sain.</p>
                    <p class="float"><img src="../img/icone-moins.png"></p><p>Evitez la pomme de terre et les frites, gardz-les pour le plaisir.</p>   
                </div>
            </div>
            <div><img class="eau" src="../img/eau.jpg"></div>
            <div><img class="eau" src="../img/bouger.jpg"></div>
            </br>
            </br>
            </br>
            </br>
            </br>
           

		</section>

		<footer>
			<?php include("../include/footer.php") ?>
		</footer>
	</body>
</html>