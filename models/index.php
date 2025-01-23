<?php
$resp = array();

// adatbázis alapú adatok lekérése
$sql = "SELECT id, nev, sor, oszlop FROM " . DB_PREFIX . "_osztaly ORDER BY sor, oszlop";
$result = $conn->query($sql);

$sor = NULL;

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$resp[] = array('id' => $row['id'], 'nev' => $row['nev'], 'sor' => $row['sor'], 'oszlop' => $row['oszlop']);
	}
}
?>