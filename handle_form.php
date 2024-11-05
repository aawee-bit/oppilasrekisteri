<?php
// Tarkista, että kaikki kentät on täytetty
if (isset($_POST['name'], $_POST['email'], $_POST['class'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];

    // Yhdistä tietokantaan (muista muokata tietokantayhteyden tiedot)
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Tarkista yhteys
    if ($conn->connect_error) {
        die("Yhteyden muodostaminen epäonnistui: " . $conn->connect_error);
    }

    // Valmistele ja suorita SQL-lause
    $sql = "INSERT INTO oppilaat (name, email, class) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $class);

    if ($stmt->execute()) {
        echo "Uusi oppilas lisätty onnistuneesti!";
    } else {
        echo "Virhe oppilaan lisäämisessä: " . $stmt->error;
    }

    // Sulje yhteys
    $stmt->close();
    $conn->close();
} else {
    echo "Täytä kaikki kentät.";
}
?>
