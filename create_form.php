<?php
include "config.php";

if ($conn->connect_error) {
    die("Yhteyden muodostaminen epäonnistui: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = $_POST['nimi'];
    $sahkoposti = $_POST['sahkoposti'];
    $luokka = $_POST['luokka'];

    $sql = "INSERT INTO oppilaat (nimi, sahkoposti, luokka) VALUES ('$nimi', '$sahkoposti', '$luokka')";

    if ($conn->query($sql) === TRUE) {
        echo "Uusi oppilas lisätty rekisteriin!";
    } else {
        echo "Virhe: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisää uusi oppilas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Uuden oppilaan lisääminen</h2>
    <header>
    <?php include "header.php" ?>
    </header>
    <br>
    <form class="oppilas_lisaus" action="" method="post">
        <label for="nimi">Nimi:</label><br>
        <input type="text" id="nimi" name="nimi" required><br><br>

        <label for="sahkoposti">Sähköposti:</label><br>
        <input type="email" id="sahkoposti" name="sahkoposti" required><br><br>

        <label for="luokka">Luokka:</label><br>
        <input type="text" id="luokka" name="luokka" required><br><br>

        <input type="submit" value="Lisää oppilas">
    </form>
    <form class="oppilas_lisaus" action="index.php" method="GET">
        <button type="submit">Takaisin</button>
    </form>

    <?php include "footer.php" ?>

</body>
</html>
