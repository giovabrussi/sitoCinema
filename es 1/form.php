<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title>Esercizio 1</title>
</head>

<body>

    <h1 class="text-center mt-5 titolo">Cinema Orwell</h1>
    <p class="text-center fs-5">Dal 1984</p>

    <div class="cart w-50 mx-auto mt-3">
        <h1><span class="bg-white bg-opacity-75 text-success">Inserisci</span> i dati dell'attore</h1>

        <form action="./inserisci.php" method="POST">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="nazione" placeholder="Nazionalita">
            <input type="number" name="data" placeholder="Anno di nascita">
            <input type="number" name="id" placeholder="Codice attore">
            <input type="submit" value="Inserisci">
        </form>

        <h1 class="mt-3"><span class="bg-white bg-opacity-75 text-danger">Elimina</span> proiezione</h1>

        <form action="./elimina.php" method="POST">
            <!-- <input type="number" name="idproiezione" placeholder="Codice proiezione"> -->
            <select id="idproiezione" name="idproiezione" >
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
            <input class="mt-2" type="submit" value="Elimina">
        </form>

        <h1 class="mt-3"><span class="bg-white bg-opacity-75 text-primary">Aggiornare</span> il voto di una recensione
        </h1>

        <form action="./aggiorna.php" method="POST">
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
            <input type="number" name="nuovarecensione" placeholder="Nuovo voto" min="1" max="5" style="width: 120px">
            <input type="submit" value="Aggiorna">
        </form>

        <a href="../index.html"><button type="button" class="btn btn-warning btn-sm mt-3">Torna alla home</button></a>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>