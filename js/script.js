var log = document.getElementById("login");

log.addEventListener("click", modaleLog);

function modaleLog()
{
	var modaleLog = document.getElementById("modaleLog");
	var log = document.getElementById("log");

	modaleLog.style.display = "block";
	log.style.display = "block";	
}