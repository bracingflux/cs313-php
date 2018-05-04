var timer = setInterval(updateTime, 1000);

function updateTime() {
	var filepath = "a1.php";
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function getStatus() {
	if (this.readyState == 4 && this.status == 200) {
		var info = this.responseText;
		document.getElementById("time1").innerHTML = info;
	}
};
	xhttp.open("GET", filepath, true);
	xhttp.send();
}