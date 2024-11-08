<?php
require("common/db.req.php");
include("common/nav.inc.php");

if (!isset($_SESSION["id"])) {
    header("Refresh:0; url=index.php");
}

if (isset($_FILES["profilePicture"]["tmp_name"])) {
    $target_dir = "uploads/profilePictures/";
    $filename = basename($_FILES["profilePicture"]["name"]);
    $filename_arr = preg_split("/\./", $filename);
    $target_file = $target_dir . $_SESSION["id"] . "." . $filename_arr[1];

    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
        echo "A " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " fájl sikeresen feltöltve.";
    } else {
        echo "Hiba történt a fájl feltöltése során.";
    }
}
?>

<section>
    <form action="profil.php" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center">
        <p>Válaszd ki a feltöltendő képet</p>
        <input type="file" name="profilePicture" id="profilePicture">
        <input type="submit" value="Kép feltöltése" class="btn btn-outline-success">
    </form>
</section>

<?php include("common/footer.inc.php"); ?>