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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppilaslista</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Oppilaslista</h2>
    <header>
    <?php include "header.php"?>
    <?php include "footer.php"?>
    </header>
    <table>
    <tr>
        <th>Nimi</th>
        <th>Poista</th>
    </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<td>" . htmlspecialchars($row['nimi']) . "</td>";
                echo "<td>" . "<a href='delete_confirm.php?id=" . $row['id'] . "'>Poista</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Ei oppilaita tietokannassa.</td></tr>";
        }
        ?>
    </ul>

</body>
</html>

<?php
$conn->close();
?>
