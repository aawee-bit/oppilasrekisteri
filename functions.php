<?php

function validate_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function check_existing_email($email) {
    // Esimerkki tietokantakyselystä, käytä oikeaa yhteyttä.
    return false; 
}

function sanitize_string($string) {
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function display_message($message, $type) {
    if ($type == 'success') {
        echo "<div style='color: green;'>$message</div>";
    } elseif ($type == 'error') {
        echo "<div style='color: red;'>$message</div>";
    } else {
        echo "<div>$message</div>";
    }
}

?>
