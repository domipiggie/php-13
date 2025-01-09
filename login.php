<?php
require("common/db.req.php");
include("common/head.inc.php");
include("common/nav.inc.php");

$valasz = "";

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $param = $_POST["username"];
    $stmt = $conn->prepare("SELECT id, nev, password, isAdmin FROM ".DB_PREFIX."_osztaly WHERE username = ?");
    $stmt->bind_param("s",$param);

    $result = $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
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
?>

<section>
    <form method="POST" action="login.php" class="d-flex flex-column align-items-center">
        <input type="text" name="username" placeholder="Felhasználónév">
        <input type="password" name="password" placeholder="Jelszó">
        <input type="submit" value="Belépés" class="btn btn-success">
        <?php echo $valasz; ?>
    </form>
</section>

<?php include("common/footer.inc.php"); ?>