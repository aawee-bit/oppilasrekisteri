<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Oppilas haku</title>
</head>
<body>
    <h1>Haku</h1>

    <header>
    <?php include "config.php"?>
    <?php include "header.php"?>
    <?php include "footer.php"?>
    </header>
    <?php
    $haku = $_POST['haku'];

    $sql = "SELECT id, nimi, sahkoposti, luokka FROM oppilaat WHERE nimi LIKE '$haku%'";
    $result = $conn->query($sql);
    
    $tulokset = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tulokset += 1;
            
        }
    }
    echo '<p style="text-align:center;">Haetaan nimellä ' . $haku . '. Tuloksia on ' . $tulokset . '.</p>';
    
    echo '<table>
    <tr>
        <th>Nimi</th>
        <th>Sähköposti</th>
        <th>Luokka</th>
    </tr>';

    $sql = "SELECT id, nimi, sahkoposti, luokka FROM oppilaat WHERE nimi LIKE '$haku%'";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Query failed: " . $conn->error);
    }

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nimi']);
                echo "<td>" . htmlspecialchars($row['sahkoposti']) . "</td>";
                echo "<td>" . htmlspecialchars($row['luokka']) . "</td>";
                echo "</tr>";
            }
    } else {
            echo "<tr><td colspan='3'>Ei löytynyt oppilaita tällä nimellä</td></tr>";
        }
    ?>
    </table>
</body>
</html>
