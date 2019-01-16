// déclaration des variables
var fruits = document.getElementById("fruits");
var compotes = document.getElementById("compotes");


fruits.addEventListener("click",function(){
    document.location.href="listeproduits.php?cat=fruits";
});