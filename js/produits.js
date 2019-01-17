// déclaration des variables
var cat = [];

for (i=1;i<38;i++) {
    cat[i] = document.getElementById("cat"+i);
}
// envoi de la catégorie cliquée via url

for (i=1;i<38;i++){
j=i;
    (function(j){
        cat[i].addEventListener("click",function(){
            document.location.href="listeproduits.php?cat="+j;
            console.log(j);
        },false);
    })(i);
}
