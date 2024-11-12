<?php
$host = 'localhost';
$dbname = 'oppilasrekisteri';
$username = 'root';              
$password = '';         // Jos Xampilla niin jätä tyhjäksi, uWampilla "root"

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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .edit {
            margin-left: 10px;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
<h2>Oppilastiedot</h2>
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
            "<a class='edit' href='updateform.php?id=" . urlencode($row['id']) . "&field=nimi'>Muokkaa</a></td>";

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
