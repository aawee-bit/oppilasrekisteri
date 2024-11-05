<?php

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['class'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];

    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Yhteyden muodostaminen epäonnistui: " . $conn->connect_error);
    }

    $sql = "INSERT INTO oppilaat (name, email, class) VALUES ('$name', '$email', '$class')";

    if ($conn->query($sql) === TRUE) {
        echo "Uusi oppilas lisätty onnistuneesti!";
    } else {
        echo "Virhe lisättäessä oppilasta: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Täytä kaikki kentät.";
}
?>
