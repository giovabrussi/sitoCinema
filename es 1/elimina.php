<?php
session_start();
include ("../connection.php");
use UI\Controls\Button;
$codice = $_POST["idproiezione"];

$sql = "DELETE FROM Proiezioni WHERE CodProiezione=$codice";

if ($connection->query($sql) === TRUE) {
    if ($connection->affected_rows==0) {
    $_SESSION["msg"] = "La proiezione non esiste";
    header("Location: ../errore.php");           
    } else {
        $_SESSION["msg"] = "Proiezione eliminata!";
        header("Location: ../messaggio.php"); 
    }
} else {
    $_SESSION["msg"] = "Inserire il codice";
    header("Location: ../errore.php");   
}

echo "<button><a href='form.html'>Torna al form</a></button>";

$connection->close();

?>