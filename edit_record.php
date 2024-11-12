<?php
include "config.php";

$id = 1000;
$nimi = "storyofundertale";
$luokka = "skibiid";

if (empty($id)) {   // jos opiskelijaa ei valittu
    echo "Sinun pitää valita oppilas jota muokata";
} else {
WHERE EXIS
    if (empty($nimi)) {         // nimi
        echo "Nimi oli tyhjä, ei päivitetty.";  // jos käyttäjä ei täyttänyt nimi kohtaan mitään
    } else {
        $sql = "UPDATE oppilaat SET nimi='$nimi' WHERE id=$id"; // jos nimi kohtaan pantiin jotain, panee sen minne se kuuluu
        $conn->query($sql);
        echo "Nimi päivitetty! ", $nimi;
    }
    echo "<br>";
    if (empty($sahkoposti)) {   // sähköposti
        echo "Sahköposti oli tyhjä, ei päivitetty.";
    } else {
        $sql = "UPDATE oppilaat SET sahkoposti='$sahkoposti' WHERE id=$id";
        $conn->query($sql);
        echo "Sähköposti päivitetty! ", $sahkoposti;
    }
    echo "<br>";
    if (empty($luokka)) {       // luokka
        echo "Luokka oli tyhjä, ei päivitetty.";
    } else {
        $sql = "UPDATE oppilaat SET luokka='$luokka' WHERE id=$id"; 
        $conn->query($sql);
        echo "Luokka päivitetty! ", $luokka;
    }
    echo "<br>";
}

// käyttäjän panemat uudet infot ovat $nimi, $sahkoposti, $luokka, ja valitsema id on $id
?>