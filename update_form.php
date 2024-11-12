<?php

include "db_connection.php";

$id = $_GET['id'];
$sql = "SELECT * FROM oppilaat WHERE id ='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nimi = $row["nimi"];
      $sahkoposti = $row["sahkoposti"];
      $luokka = $row["luokka"];
    }
}
if(isset($_POST['luokka'])) {
$id = $_POST['id'];
$nimi = $_POST["nimi"];
$sahkoposti = $_POST["email"];
$luokka = $_POST["luokka"];

$sql = "UPDATE oppilaat SET nimi='$nimi', sahkoposti='$sahkoposti', luokka='$luokka' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Oppilaan tiedot muokattu onnistuneesti";
} else {
    echo "Virhe: " . $conn->error;
} }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updateform</title>
</head>
<body>
    <h2>Kirjoita tietosi ja paina submit, tietosi menee rekisteriin</h1><form method="post" action="" >
    <input type="text" placeholder="Nimi" name="nimi" value= '<?php echo $nimi;?>'>
    <input type="email" placeholder="Email tili" name="email" value= '<?php echo $sahkoposti;?>'>
    <input type="text" placeholder="Luokka" name="luokka" value= '<?php echo $luokka;?>'>
    <input type="hidden" name="id" value= '<?php echo $id;?>'>
    <input type="submit" value="submit"></form>
    <p id="result"></p>
</body>
</html>

