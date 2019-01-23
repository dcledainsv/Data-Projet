// déclaration des variables
var favoris = document.getElementById("favoris");
var cat = [];

for (i=1;i<38;i++) {
    cat[i] = document.getElementById("cat"+i);
}

// envoi de la catégorie cliquée via url
favoris.addEventListener("click",function(){
    document.location.href="listeproduits.php?cat=0";
})

for (i=1;i<38;i++){
j=i;
    (function(j){
        cat[i].addEventListener("click",function(){
            document.location.href="listeproduits.php?cat="+j;
        },false);
    })(i);
}
