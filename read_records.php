<?php
$host = 'localhost';
$dbname = 'oppilasrekisteri';
$username = 'root';              
$password = 'root';         // Jos Xampilla niin jätä tyhjäksi, uWampilla "root"

$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset('utf8mb4');

// Kokeillaan connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nimi, sahkoposti, luokka FROM oppilaat";
$result = $conn->query($sql);

if ($result === false) {
    // Näyttää erroria jos result = false
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taulukko</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h2>Oppilastiedot</h2>
<header>
    <?php include "header.php"?>
    <?php include "footer.php"?>
    </header>
<table>
    <tr>
        <th>Nimi</th>
        <th>Sähköposti</th>
        <th>Luokka</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";

            echo "<td>" . htmlspecialchars($row['nimi']) .
            "<a class='edit' href='update_form.php?id=" . urlencode($row['id']) . "&field=nimi'>Muokkaa</a></td>";

            echo "<td>" . htmlspecialchars($row['sahkoposti']) . "</td>";
            echo "<td>" . htmlspecialchars($row['luokka']) . "</td>";
            echo "</tr>";
        }
} else {
        echo "<tr><td colspan='3'>Dataa ei löytynyt</td></tr>";
    }

    ?>
</table>
<?php
$conn->close();
?>
</body>
</html>
