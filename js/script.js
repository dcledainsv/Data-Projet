
//	==> Modale

//  **********************************************************************************************
//  *	Description :
//  *		Ce code permet au clic "Connexion / Inscription" de faire apparaître une div modale
//  *		afin de permettre )à l'utilisateur de se connecter ou de s'inscrire.
//  **********************************************************************************************

var log = document.getElementById("login");

log.addEventListener("click", modaleLog);

function modaleLog()
{
	var modaleLog = document.getElementById("modaleLog");

	modaleLog.style.display = "block";
}