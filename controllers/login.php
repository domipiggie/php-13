<?php

$valasz = "";

if (isset($_POST["username"]) && isset($_POST["password"])) {
	require "models/login.php";

	if ($row) {
		 if (hash_equals(hash('sha256', $_POST["password"]), $row["password"])) {
			  $valasz = "Üdv " . $row["nev"] . "!";
			  $_SESSION["id"] = $row["id"];
			  $_SESSION["nev"] = $row["nev"];
			  $_SESSION["isAdmin"] = $row["isAdmin"];
			  header("Refresh:0; url=index.php");
		 } else {
			  $valasz = "Hibás jelszó!";
		 }
	} else {
		 $valasz = "Rossz felhasználónév!";
	}
} elseif (isset($_SESSION["id"])) {
	unset($_SESSION["id"]);
	unset($_SESSION["nev"]);
	unset($_SESSION["isAdmin"]);
	header("Refresh:0");
}

require "views/login.php";
?>