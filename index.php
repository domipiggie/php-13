<?php
$ulesrend = [
    ["1.oszlop", "2.oszlop", "Folyosó", "3.oszlop", "4.oszlop", "Folyosó", "5.oszlop"],
    ["-", "Tanár",  "Gulyás Máté", "Lénárt Áron",  "-"],
    ["Mészáros Marcell", "Básti Domonkos",  "Keindl Bercel", "Kis Balázs",  "-"],
    ["Csik Melinda", "Karakas Roland",  "Ábrahám Dávid", "Détári Leon",  "Togyeriska Viktor"],
    ["-", "-",  "Giczi Atilla", "Preil Ákos",  "Sivinger Miklós"]
];
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,
        th {
            border: 1px solid black;
            width: 100%;
            padding: 10px;
        }

        tr {
            display: flex;
            justify-content: space-between;
        }

        table {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            text-align: center;
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>13.i Ülésrend</h1>
    <table>
        <?php
        foreach ($ulesrend as $i => $sor) {
            $offset = 0;
            echo "<tr>";
            echo $i != 0 ? "<th>$i</th>" : "<th>#</th>";
            foreach ($sor as $j=>$diak) {
                if ($ulesrend[0][$j+$offset]=="Folyosó" and $i>0){
                    echo "<td></td>";
                    $offset++;
                }
                echo $i == 0 ? "<th>$diak</th>" : "<td>$diak</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>