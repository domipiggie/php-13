<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["keresett_nev"])) {
		$nameErr = "Nem írtál be nevet 💀";
	} else if (strlen($_POST["keresett_nev"]) < 2) {
		$nameErr = "Írj be legalább két karaktert";
	} else {
		$name = $_POST["keresett_nev"];
	}
}

// adatbázis alapú adatok lekérése és továbbítása a view felé
require "models/index.php";
require "views/index.php";
?>