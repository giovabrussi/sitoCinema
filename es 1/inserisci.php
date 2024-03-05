<?php
session_start();
use UI\Controls\Button;
include ("../connection.php");
$nomeattore = $_POST["nome"];
$nazionalita = $_POST["nazione"];
$annonascita = $_POST["data"];
$codice = $_POST["id"];

$sql = "INSERT INTO attori VALUES ($codice, '$nomeattore', $annonascita, '$nazionalita')";

if ($connection->query($sql) === TRUE) {
  if ($connection->affected_rows==0) {
    $_SESSION["msg"] = "L'attore non può essere inserito";
    header("Location: ../errore.php");              
  } else {
    $_SESSION["msg"] = "Attore inserito!";
        header("Location: ../messaggio.php"); 
  }
} else {
  $_SESSION["msg"] = "Riempi tutti i campi";
  header("Location: ../errore.php");  
}




echo "<button><a href='form.html'>Torna al form</a></button>";

$connection->close();

?>