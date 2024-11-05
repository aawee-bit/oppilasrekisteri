<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Oletko varma?</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (!isset($_GET['id'])) {
    echo 'ID:tä ei ole annettu.';
    exit;
}
$id = $_GET['id'];

if (isset($_POST['vahvistus'])) {
    if ($_POST['vahvistus'] == "joo") {
        header('Location:delete_record.php?id=' . $id);
    }
    if ($_POST['vahvistus'] == "ei") {
        echo 'Poisto peruttu.';
        echo '<a href="read_records.php"><button>Takaisin oppilas listaan</button></a>';
        exit;
    }
}
?>

    <h2>Oletko varma, että haluat poistaa oppilaan tietokannasta?</h2>
    <form method="POST">
        <button type="submit" name="vahvistus" value="joo">Kyllä</button>
        <button type="submit" name="vahvistus" value="ei">Peruuta</button>
    </form>
</body>
</html>
