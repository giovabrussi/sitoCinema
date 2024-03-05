<?php
session_start();
include ("../connection.php");
//raccolgo i dati dal form
$idrecensione = $_POST["idrecensione"];
$scelta = $_POST["scelta"];
$nuovovoto = $_POST["nuovovoto"];

//in base alla scelta elimino o aggiorno
switch ($scelta) {
    case 'update':
        //scrivo la query
        $sql = "UPDATE Recensioni SET Voto=$nuovovoto WHERE IDRecensione=$idrecensione";
        //faccio la query
        $connection->query($sql);
        //controllo se sono state aggiornate delle righe
        if ($connection->affected_rows==0) {
            $_SESSION["msg"] = "Errore durante l'aggiornamento";
            header("Location: ../errore.php");         
        } else {
            $_SESSION["msg"] = "Recensione aggiornata!";
            header("Location: ../messaggio.php");
        }
        break;
    case 'delete':
        //scrivo la query
        $sql = "DELETE FROM Recensioni WHERE IDRecensione=$idrecensione";
        //faccio la query
        $connection->query($sql);
        //controllo se sono state aggiornate delle righe
        if ($connection->affected_rows==0) {
            $_SESSION["msg"] = "Errore durante l'eliminazione";
            header("Location: ../errore.php");               
        } else {
            $_SESSION["msg"] = "Recensione eliminata!";
            header("Location: ../messaggio.php");
        }
        break;
    default:
        echo "Errore";
        break;
}

echo "<a href='form.html'><button>torna al form</button></a>";

?>