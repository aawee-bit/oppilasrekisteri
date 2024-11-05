<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "oppilasrekisteri";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Yhteys epäonnistui: ". $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $delete = $_POST['id'];
    $sql = mysqli_query($conn, "DELETE FROM oppilaat WHERE id = '$delete'");
}

if ($conn->query($sql) === TRUE) {
    echo "Oppilas poistettu";
} else {
    echo "Ongelma tapahtui: " . $conn->error;
}

$conn->close();
?>