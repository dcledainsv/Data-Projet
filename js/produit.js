
// insertion image nutriscore
var imgns = document.getElementById('imgNS');
var ns = document.getElementById('valNS').value;
if (ns == 'A'){
    imgns.innerHTML = "<img src='../img/nutriscore-a.png'/>";
} else {
    imgns.innerHTML = "<img src='../img/nutriscore-b.png'/>";
}

// portion si oeufs
var part = document.getElementById('part').value;
var portion = document.getElementById('portion');
if (part == 104){
    portion.innerHTML = "<strong> Portion</strong> : 104 g (soit 2 oeufs)";
}