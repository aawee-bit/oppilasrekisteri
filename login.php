<?php
include "config.php";
$timezone = date_default_timezone_get();
date_default_timezone_set($timezone);
$aika = date("d.m.Y H:i");
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck < 1) {
    $_SESSION['warning'] = "Käyttää ei löydy";
    header("location:password.php");
} else {
    if ($row = mysqli_fetch_assoc($result)) {
        $salasanamuunnos = $row['password'];
        if ($salasanamuunnos == FALSE) {
            $_SESSION['warning'] = "Salasana tai käyttäjänimi on väärin";
            header("location:password.php");
        } else if ($salasanamuunnos == TRUE) {
            $_SESSION['loggeduser46232'] = $username;

            echo $_SESSION['loggeduser46232'];
            echo " on kirjautunut sisään palveluun onnistuneesti";
            ?>
            
            <?php
        }
    }
}

?>
