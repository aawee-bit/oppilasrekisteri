<?php

include "db_connection.php";

if (isset($_GET['id']) && isset($_POST['vahvistus']) && $_POST['vahvistus'] == 'joo') {
    $id = $_GET['id'];

    $sql = "DELETE FROM oppilaat WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Oppilas poistettu!</p>";
            header("Location: index.php");
            exit(); 
        } else {
            echo "<p style='color: red;'>Virhe poistettaessa oppilasta: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p style='color: red;'>Virhe valmisteltaessa poistoa: " . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Oletko varma?</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Oletko varma, että haluat poistaa oppilaan tietokannasta?</h2>
    <form method="POST">
        <button type="submit" name="vahvistus" value="joo">Kyllä</button>
    </form>
    <form action="index.php" method="GET">
        <button type="submit">Peruuta</button>
    </form>
</body>
</html>
