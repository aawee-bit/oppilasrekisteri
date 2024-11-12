<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "oppilasrekisteri";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Yhteyden muodostaminen epäonnistui: " . $conn->connect_error);
}

$sql = "SELECT id, nimi FROM oppilaat";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Oppilaslista</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Oppilaslista</h1>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['nimi']) . " ";
                echo "<a href='delete_confirm.php?id=" . $row['id'] . "'>Poista</a>";
                echo "<li>";
            }
        } else {
            echo "Ei oppilaita tietokannassa.";
        }
        ?>
    </ul>

</body>
</html>

<?php
$conn->close();
?>
