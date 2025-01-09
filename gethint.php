<?php
require "common/db.req.php";

$q = $_REQUEST["q"];

$resp = array();

if (strlen($q) > 1 and preg_match('/[A-Za-z-áéíóöőúüűÁÉÍÓÖŐÜŰ]$/', $q)) {
    $param = "%{$q}%";
    $stmt = $conn->prepare("SELECT nev,id FROM ".DB_PREFIX."_osztaly WHERE nev LIKE ? ORDER BY nev");
    $stmt->bind_param("s",$param);

    $result = $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $resp[] = array("id" => $row["id"], "nev" => $row["nev"]);
        }
        echo json_encode(array("nevek" => $resp));
    }
}
?>