# oppilasrekisteri


Oppilasrekisteri. Tämä rekisteri sisältää oppilaiden tietoja, kuten nimen, sähköpostiosoitteen ja mahdollisesti luokan. Palvelussa voi lisätä, lukea, muokata ja poistaa tietoja tästä rekisteristä.  

 

lista (14 tiedostoa): 

**db_connection.php ja config.php **

Tehtävänanto: Luo tietokantayhteys, jota muut tiedostot käyttävät. Tämä tiedosto tarkistaa yhteyden onnistumisen ja antaa virheilmoituksen, jos yhteys epäonnistuu. Määrittele tietokantayhteyden asetukset, kuten palvelin, käyttäjätunnus, salasana ja tietokannan nimi. Tämä tiedosto sisältää vain nämä asetukset, jotta tietokantatiedot on helppo päivittää yhdestä paikasta. 

**header.php ja footer.php **

Tehtävänanto: Luo sivuston yläosa, jossa on navigointivalikko. Valikossa tulee olla linkit "Oppilasrekisteri", "Lisää oppilas" ja "Hallinnoi tietoja". Lisää footer-sivustolle alatunniste. Voit lisätä tähän esimerkiksi tekijänoikeustiedot tai oman nimesi sekä päivämäärän, jolloin työ on luotu. 

**create_form.php **

Tehtävänanto: Tee lomake uuden oppilaan lisäämiseksi rekisteriin. Lomakkeessa tulee olla kentät nimelle, sähköpostiosoitteelle ja luokalle. 

**insert_record.php **

Tehtävänanto: Käsittele create_form.php-lomakkeesta lähetetyt tiedot ja lisää ne tietokantaan. Tarkista ennen tallennusta, että kaikki kentät on täytetty oikein. 

**read_records.php 
**
Tehtävänanto: Hae kaikki oppilastiedot tietokannasta ja näytä ne taulukossa. Käytä sarakkeita, kuten "Nimi", "Sähköposti" ja "Luokka". Taulukon jokainen rivi tulee sisältää linkit tietojen muokkaamiseen ja poistamiseen. 

**update_form.php **

Tehtävänanto: Tee lomake, jolla voidaan päivittää valitun oppilaan tietoja. Lomakkeessa on valmiiksi täytetyt tiedot (nimi, sähköposti ja luokka), jotka käyttäjä voi muuttaa. 

**edit_record.php **

Tehtävänanto: Hae muokattavan oppilaan tiedot tietokannasta ja näytä ne update_form.php 

. Tämä tiedosto toimii linkkinä lomakkeen ja tietokannan välillä. 

**update_record.php **

Tehtävänanto: Päivitä oppilaan tiedot tietokannassa lomakkeesta lähetettyjen uusien tietojen mukaisesti. 

**delete_record.php **

Tehtävänanto: Poista valitun oppilaan tiedot tietokannasta, kun käyttäjä vahvistaa poistamisen. 

**delete_confirm.php **

Tehtävänanto: Luo yksinkertainen "Oletko varma?" -viesti ennen tietueen poistamista. Anna käyttäjälle mahdollisuus joko vahvistaa tai perua poisto. 

**functions.php **

Tehtävänanto: Toteuta yleisiä funktioita, joita muut tiedostot voivat hyödyntää. Funktiot voivat olla: 

validate_input($data) – Tarkistaa ja siivoaa käyttäjän syöttämän datan, kuten poistaa ylimääräiset välilyönnit ja erikoismerkit. 

validate_email($email) – Tarkistaa, että syötetty sähköpostiosoite on oikeassa muodossa. 

check_existing_email($email) – Tarkistaa, onko tietokannassa jo käytössä kyseinen sähköpostiosoite. 

sanitize_string($string) – Muuntaa erikoismerkit turvalliseen muotoon ennen tietokantaan tallentamista, jotta vältytään SQL-injektiohyökkäyksiltä. 

redirect($url) – Yksinkertainen funktio, joka ohjaa käyttäjän toiselle sivulle. 

display_message($message, $type) – Näyttää tietyn tyyppisen viestin (esim. virhe, onnistuminen) sivulla. 

**index.php **

Tehtävänanto: Luo pääsivu, jossa on yhteenveto CRUD-toiminnoista. Pääsivulla voi olla linkit oppilasrekisterin lukemiseen, uuden oppilaan lisäämiseen sekä oppilastietojen muokkaamiseen ja poistamiseen. 



SQL

-- Luodaan tietokanta oppilasrekisteri, jos sitä ei vielä ole olemassa
CREATE DATABASE IF NOT EXISTS oppilasrekisteri;

-- Valitaan tietokanta
USE oppilasrekisteri;

-- Luodaan oppilaat-taulu
CREATE TABLE IF NOT EXISTS oppilaat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nimi VARCHAR(100) NOT NULL,
    sahkoposti VARCHAR(100) NOT NULL UNIQUE,
    luokka VARCHAR(50) NOT NULL
);






 
