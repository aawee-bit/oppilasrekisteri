<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Kirjaudu sisään</title>
</head>
<body>

    <h1>Kirjaudu</h1>
    <b><a class="loga" href="password.php">Kirjaudu</a></b>

    <header>
    <?php include "header.php"?>
    </header>

    <form action="login.php" method="post">
        <table>
            <tr><td><Label>Käyttäjänimi</Label><br><input type="email" name="username" required value="
                <?php if (isset($_SESSION['success'])) { 
                    echo $_SESSION['loggeduser55511'];
                } 
                ?>
                "></td></tr>
            <tr><td><Label>Salasana</Label><br><input type="password" name="password" required></td></tr>
            <tr><td><input type="submit" value="Kirjaudu Sisään"></td></tr>
        </table>
    </form>

    <?php include "footer.php"?>

    <?php

    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['warning'])) {
        echo $_SESSION['warning'];
        unset($_SESSION['warning']);
    }

    ?>
    <script src="script.js"></script>
</body>
</html>