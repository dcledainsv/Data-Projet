//déclaration des variables pour choix portion
var nbreProd = document.getElementById('nbreProd').value;

var demiP = [];
var P = [];
var undemiP = [];
var doubleP = [];
var qteG = [];

for (i=0;i<nbreProd;i++) {
    demiP[i]= document.getElementById("demiP"+i);
    P[i] = document.getElementById("P"+i);
    undemiP[i] = document.getElementById("undemiP"+i);
    doubleP[i] = document.getElementById("doubleP"+i);
    qteG[i] = document.getElementById("qteG"+i);
}

function selectDemiP(i){       
    demiP[i].style.backgroundColor = '#9dbf15' ; 
    P[i].style.backgroundColor = '#dbf37a';  
    undemiP[i].style.backgroundColor = '#dbf37a';
    doubleP[i].style.backgroundColor = '#dbf37a';
}
function selectP(i){       
    demiP[i].style.backgroundColor = '#dbf37a' ; 
    P[i].style.backgroundColor = '#9dbf15';  
    undemiP[i].style.backgroundColor = '#dbf37a';
    doubleP[i].style.backgroundColor = '#dbf37a';
}
function selectUndemiP(i){       
    demiP[i].style.backgroundColor = '#dbf37a' ; 
    P[i].style.backgroundColor = '#dbf37a';  
    undemiP[i].style.backgroundColor = '#9dbf15';
    doubleP[i].style.backgroundColor = '#dbf37a';
}
function selectDoubleP(i){       
    demiP[i].style.backgroundColor = '#dbf37a' ; 
    P[i].style.backgroundColor = '#dbf37a';  
    undemiP[i].style.backgroundColor = '#dbf37a';
    doubleP[i].style.backgroundColor = '#9dbf15';
}

// déclaration des variables pour calories du menu
var calMenu = document.getElementById('calMenu');

var valBJ = document.getElementById('valBJ').value;
var valCalMenu = document.getElementById('valCalMenu').value;

// changement couleur de fond si apport > besoins
console.log(valCalMenu);
console.log(valBJ);

if (valCalMenu < valBJ){ 
    calMenu.style.backgroundColor = '#9dbf15d';
    calMenu.style.color = '#712727';
    
} else {
    calMenu.style.backgroundColor = 'red';
    calMenu.style.color = 'black';
}

//déclaration des variables pour  % G, L et P
var glu = document.getElementById('G');
var lip = document.getElementById('L');
var prot = document.getElementById('Pr');

var tauxG = document.getElementById('tauxG').value;
var tauxL = document.getElementById('tauxL').value;
var tauxP = document.getElementById('tauxP').value;

// changement couleur de fond selon valeurs cibles
if(tauxG < 40){
    glu.style.backgroundColor = 'orange';
} else if (tauxG > 50){
    glu.style.backgroundColor = 'red';
} else {
    glu.style.backgroundColor = 'green';
}

if(tauxL < 30){
    lip.style.backgroundColor = 'orange';
} else if (tauxL > 40){
    lip.style.backgroundColor = 'red';
} else {
    lip.style.backgroundColor = 'green';
}

if(tauxP < 15){
    prot.style.backgroundColor = 'orange';
} else if (tauxP > 29){
    prot.style.backgroundColor = 'red';
} else {
    prot.style.backgroundColor = 'green';
}
