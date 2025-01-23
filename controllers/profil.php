<?php

if (!isset($_SESSION["id"])) {
    header("Refresh:0; url=index.php");
}

$target_dir = "uploads/profilePictures/";
$jpegExt = array('jpg', 'jpeg', 'JPG', 'JPEG');

// van-e feltöltött file, és menettük-e ideiglenes néven?
if (isset($_FILES["profilePicture"]["tmp_name"])) {
    // hová mentjük és milyen néven?
    if ($filename = basename($_FILES["profilePicture"]["name"])) {
        $filenameArr = preg_split("/\./", $filename);

        if (function_exists('mime_content_type')) {
            if (!mime_content_type($_FILES["profilePicture"]["tmp_name"])) {
                $valasz = "Hiba történt! Csak jpg fájlok tölthetők fel.";
            }
        } elseif (!in_array($filenameArr[1], $jpegExt)) {
            $valasz = "Hiba történt! Csak jpg fájlok tölthetők fel.";
        }
        if (!isset($valasz)) {
            $target_file = $target_dir . $_SESSION["id"] . ".jpg";

            // áthelyezzük az ideiglenes fájlt a végleges nevén a helyére
            if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                $valasz = "A " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " " . $mime . " fájl feltöltésre került";
            } else {
                $valasz = "Sajnos hiba történt a fájl feltöltése során.";
            }
        }
    } else {
        $valasz = "Nem jelöltél ki feltöltendő fájlt.";
    }
} elseif (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'deleteimg') {
        if (file_exists($target_dir . $_SESSION["id"] . ".jpg")) {
            if (unlink($target_dir . $_SESSION["id"] . ".jpg")) {
                $valasz = "A profilkép törlésre került";
            }
        }
    }
}

require "views/profil.php";
?>