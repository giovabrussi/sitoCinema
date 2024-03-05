<?php
session_start();

include ("../connection.php");
use UI\Controls\Button;
$id = $_POST["idrecensione"];
$voto = $_POST["nuovarecensione"];

$sql = "UPDATE Recensioni SET voto=$voto WHERE IDRecensione=$id";

if ($connection->query($sql) === TRUE) {
  if ($connection->affected_rows==0) {
    $_SESSION["msg"] = "Impossibile modificare la recensione";
    header("Location: ../errore.php"); 
  } else {
    $_SESSION["msg"] = "Recensione aggiornata!";
    header("Location: ../messaggio.php");     
  }
} else {
    $_SESSION["msg"] = "Riempi tutti i campi";
    header("Location: ../errore.php");     
}

echo "<button><a href='form.html'>Torna al form</a></button>";

$connection->close();
