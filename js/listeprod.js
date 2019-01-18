
// récupération du nombre de produit dans la catégorie (input hidden)
var nbreprod = document.getElementById('variableAPasser').value;

// déclaration des variables
var prod = [];
 for (i=1;i<nbreprod;i++) {
     prod[i] = document.getElementById("prod"+i);
 }


// fonction au click sur un produit
for (i=1;i<nbreprod;i++){
j=i;
    (function(j){
        prod[i].addEventListener("click",function(){
            // récupération de la valeur de l' id du produit (bdd)
            var idprod = document.getElementById("idprod"+j).value;
            // envoi de cette valeur dans l' URL
            document.location.href="produit.php?idprod="+idprod;
        },false);
    })(i);
}