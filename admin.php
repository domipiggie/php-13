<?php
require("common/db.req.php");

if (!isset($_SESSION["isAdmin"]) or $_SESSION["isAdmin"] != "1") {
    header("Refresh:0; url=index.php");
}

if (isset($_REQUEST['action']) and isset($_REQUEST['id'])) {
    if ($_REQUEST['action'] == 'deleteimg') {
        if (file_exists("uploads/profilePictures/" . $_REQUEST["id"] . ".jpg")) {
            if (unlink("uploads/profilePictures/" . $_REQUEST["id"] . ".jpg")) {
                $valasz = "A profilkép törlésre került";
            }
        }
    }
}

include("common/head.inc.php");
include("common/nav.inc.php");
?>

<section>
    <div>
        <h1> 13. I. 1. csoport</h1>
        <h2> Ülésrend - Admin</h2>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Első Oszlop</th>
                <th scope="col">Második Oszlop</th>
                <th scope="col">Folyosó</th>
                <th scope="col">Harmadik Oszlop </th>
                <th scope="col">Negyedik Oszlop</th>
                <th scope="col">Folyosó</th>
                <th scope="col">Ötödik Oszlop</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // adatbázis alapú adatok
            $sql = "SELECT id, nev, sor, oszlop FROM osztaly ORDER BY sor, oszlop";
            $result = $conn->query($sql);

            $sor = NULL;

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    if ($sor !== $row["sor"]) {
                        if ($sor !== NULL)
                            echo "</tr>"; ?>
                        <tr>
                            <th scope="row"><?php echo $row["sor"] + 1; ?></th>
                            <?php
                            $sor = $row["sor"];
                    }

                    $profileImage = "<img class=\"img-thumbnail pfp\" src=\"uploads/profilePictures/-1.jpg\">";
                    if (file_exists("uploads/profilePictures/" . $row["id"] . ".jpg")) {
                        $profileImage = "<img class=\"img-thumbnail pfp\" src=\"uploads/profilePictures/" . $row["id"] . ".jpg" . "\">";
                    } elseif (str_contains($row["nev"], "-")) {
                        $profileImage = "";
                    }

                    $nev = $row["nev"];
                    if (file_exists("uploads/profilePictures/" . $row["id"] . ".jpg")) {
                        $nev = "<p>" . $row["nev"] . "</p> <a href=\"admin.php?action=deleteimg&id=".$row["id"]."\">Kép törlése</a>";
                    }
                    echo "<td" . $class . ">" . $profileImage . "<br>" . $nev . "</td>";

                    if ($row["oszlop"] == 1 or $row["oszlop"] == 3) {
                        echo "<td>  </td>";
                    }
                }
            } else {
                echo "0 results";
            }
            ?>
            </tr>
        </tbody>
    </table>
</section>

<?php include("common/footer.inc.php"); ?>