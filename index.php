<?php

$servername = "localhost";
$username = "teszt";
$password = "teszt";
$dbname = "php_teszt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["keresett_nev"])){
        $nameErr = "Nem írtál be nevet 💀";
    } else if (strlen($_POST["keresett_nev"]) < 2){
        $nameErr = "Írj be legalább két karaktert";
    } else {
        $name = $_POST["keresett_nev"];
    }
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div>
        <h1> 13. I. 1. csoport</h1>
        <h2> Ülésrend</h2>
    </div>
    <?php if(isset($nameErr)) echo $nameErr; ?>
    <form action="index.php" method="POST">
        <input type="text" name="keresett_nev" value="<?php echo $name; ?>">
        <button type="submit">Keresés</button>
    </form>
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
              while($row = $result->fetch_assoc()) {
                if($sor !== $row["sor"]) {
                  if($sor !== NULL) echo "</tr>";
                  ?>
                  <tr>
                  <th scope="row"><?php echo $row["sor"] + 1; ?></th>
                  <?php
                  $sor = $row["sor"];
                }
                $class = '';
                if ($name != '' && stripos($row['nev'],$name) !== FALSE){
                    echo "<td style='background-color:red; color:white;'>" . $row["nev"]. "</td>";
                } else {
                    echo "<td>" . $row["nev"]. "</td>";
                }
                if($row["oszlop"] == 1 or $row["oszlop"] == 3) {
                  echo "<td>  </td>";
                }
                // echo "id: " . $row["id"]. " - Name: " . $row["nev"]. " " . $row["sor"]. " " . $row["oszlop"]. "<br>";
              }
            } 
            else {
              echo "0 results";
            }


          ?>
          </tr>
        </tbody>
      </table>

      <style>
        body{
            padding: 60px;
            text-align: center;
            background-color: rgb(236, 232, 227);
        }

        h1{
            padding: 20px auto;
            text-align: center;
        }

        h2{
            padding: 20px auto;
            text-align: center;
            margin-bottom: 40px;
        }
        label,input{
            display: block;
        }
        label{
            width: 100%;
        }
        form{
            width: 40%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        input{
            padding: 5px;
            margin-bottom: 10px;
            width: calc(100% - 20px);
            border-radius: 5px;
            border: 1px solid black;
        }
        button{
            padding: 5px;
            width: 25%;
            background-color: #1bace7;
            border: none;
            border-radius: 5px;
        }
      </style>
    
</body>
</html>
<?php

$conn->close(); 

?>