<?php
$param = $_POST["username"];
$stmt = $conn->prepare("SELECT id, nev, password, isAdmin FROM " . DB_PREFIX . "_osztaly WHERE username = ?");
$stmt->bind_param("s", $param);

$result = $stmt->execute();
$result = $stmt->get_result();

$row = NULL;

if ($result->num_rows > 0){
	$row = $result->fetch_assoc();
}
?>