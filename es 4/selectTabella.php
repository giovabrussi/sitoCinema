<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title>Esercizio 3</title>
</head>

<body>
    <h1 class="text-center mt-5 titolo">Cinema Orwell</h1>
    <p class="text-center fs-5">Dal 1984</p>

</body>

<?php
session_start();

include ("../connection.php");

$tabellaScelta = "attori";


if($_POST["ciao"] == null){
    $_SESSION["msg"] = "Checkbox vuote";
    header("Location: ../errore.php");   
}

$lista = $_POST["ciao"];


$sql = "SELECT ";
for ($i=0; $i < count($lista); $i++) { 
    $sql .= $lista[$i];
    if($i != count($lista)-1){
        $sql .= ", ";
    }
}

$sql .= " FROM $tabellaScelta";

$result = $connection->query($sql);


echo "<table >";

    
    if($result->num_rows > 0){

        $r = $result->fetch_assoc();

        echo "<tr>";
        foreach ($r as $key => $value) {
            echo "<th>" . $key ."</th>";
        };
        echo "</tr>";

        echo "<tr>";
        foreach ($r as $key => $value) {
            echo "<td>" . $value ."</td>";
        };
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $value ."</td>";
            };
            echo "</tr>";
        }
        
    }else{
        echo "tabella non trovata";
    };

echo "</table>";

?>
<a href="./index.html"><button type="button" class="btn btn-warning btn-sm m-3">Torna alla scelta</button></a>
</html>
