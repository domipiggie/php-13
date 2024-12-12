<?php
require "common/db.req.php";

$q = $_REQUEST["q"];

if (strlen($q) > 1) {
    $sql = "SELECT nev FROM osztaly WHERE nev LIKE '%" . $q . "%' ORDER BY nev";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>".$row["nev"]."</div>";
        }
    }
}
?>