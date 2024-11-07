<?php
$servername = "localhost";
$username = "teszt";
$password = "teszt";
$dbname = "php_teszt";

$valasz = "";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $sql = "SELECT id, username, password FROM osztaly WHERE username = \"" . $_POST["username"] . "\"";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (hash_equals(hash('sha256', $_POST["password"]), $row["password"])) {
            $valasz = "JOOOO LOGIN";
        } else {
            $valasz = "Hibás jelszó!";
        }
    } else {
        $valasz = "Rossz felhasználónév!";
    }
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bejelentkezés</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menü</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Belépés</a>
                    </li>
                    <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>-->
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <form method="POST" action="login.php" class="d-flex flex-column align-items-center">
            <input type="text" name="username" placeholder="Felhasználónév">
            <input type="password" name="password" placeholder="Jelszó">
            <input type="submit" value="Belépés" class="btn btn-success">
            <?php echo $valasz; ?>
        </form>
    </section>
    <style>
        body {
            background-color: rgb(236, 232, 227);
        }

        section {
            padding: 60px;
            text-align: center;
        }

        h1 {
            padding: 20px auto;
            text-align: center;
        }

        h2 {
            padding: 20px auto;
            text-align: center;
            margin-bottom: 40px;
        }

        section form input {
            padding: 10px 20px;
            border-radius: 10px;
            border: 1px solid black;
            display: block;
            margin-bottom: 10px;
        }
    </style>
</body>

</html>