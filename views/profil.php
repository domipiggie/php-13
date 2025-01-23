<?php
include("common/head.inc.php");
include("common/nav.inc.php");
?>

<section>
    <form action="index.php?page=profil" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center">
        <p>Válaszd ki a feltöltendő képet</p>
        <input type="file" name="profilePicture" id="profilePicture">
        <input type="submit" value="Kép feltöltése" class="btn btn-outline-success">
    </form>

    <div>
        <?php
        if (file_exists($target_dir . $_SESSION["id"] . ".jpg")) {
            $profileImage = "<img src=\"uploads/profilePictures/" . $_SESSION["id"] . ".jpg\">
                        <a href=\"index.php?page=profil&action=deleteimg\">Kép törlése</a>";
        } else {
            $profileImage = "<img src=\"uploads/profilePictures/-1.jpg\" class=\"profile\">";
        }
        echo $profileImage;
        ?>

    </div>
</section>

<?php include("common/footer.inc.php"); ?>