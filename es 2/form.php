<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title>Esercizio 2</title>
</head>

<body class="m-5">

    <h1 class="text-center mt-5 titolo">Cinema Orwell</h1>
    <p class="text-center fs-5">Dal 1984</p>

    <h1 class="mb-5"> <span class="bg-white bg-opacity-75 text-success">Aggiornamento</span>/<span
            class="bg-white bg-opacity-75 text-danger">eliminazione</span>
        recensione</h1>

    <form action="script.php" method="post">
        <select id="idrecensione" name="idrecensione" >
                <?php
                    include ("../connection.php");
                    $sql = "SELECT CodProiezione FROM proiezioni";
                    $result = $connection->query($sql);
                    
                    // Loop attraverso tutte le righe del risultato
                    while($row = $result->fetch_assoc()) {
                        $value = $row['CodProiezione'];
                        echo "<option value='$value'>$value</option>";
                    }            
                ?>
        </select>
        <br>
        <input type="radio" name="scelta" value="delete" checked>Elimina
        <input type="radio" name="scelta" value="update" class="mb-3">Aggiorna
        <br>
        <input type="number" name="nuovovoto" placeholder="voto" max="5" min="1" class="mb-3">
        <br>
        <input type="submit" value="invia">
    </form>

    <a href="../index.html"><button type="button" class="btn btn-warning btn-sm mt-3">Torna alla home</button></a>


</body>

</html>