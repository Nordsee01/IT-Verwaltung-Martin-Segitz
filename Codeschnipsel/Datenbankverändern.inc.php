<?PHP

function Datenbankverbindung()
{
    $username = 'root';
    $passwort = '';
    $hostname = '127.0.0.1';
    $datenbankname = 'itv_v04';
    $Con = mysqli_connect($hostname, $username, $passwort, $datenbankname);
    if (!$Con) {
        exit("Datenbank Verbindungsfehler: " . mysqli_connect_error());
    }
    return $Con;
}

// Code der in der Datenbank veränderungen macht.
//Tabelle raeume verändern
function Raumdatenändern($Con, $ID, $Nummer, $Bezeichnung, $Notiz)
{
    $Update = "Update raeume Set r_nr='" . $Nummer . "',r_bezeichnung='" . $Bezeichnung . "',r_notiz='" . $Notiz . "' Where r_id ='" . $ID . "';";
    mysqli_query($Con, $Update);
}
// Tablle lieferanten ändern
function  Lieferantendatenändern($Con, $ID, $Name, $Straße, $Postleitzahl, $Ort, $TelNr, $MobilNr, $FaxNr, $email)
{
    $Update = "Update lieferant ";
    $Update .= "Set l_firmenname='" . $Name . "',l_strasse='" . $Straße . "',l_plz='" . $Postleitzahl . "',l_ort='" . $Ort . "',l_tel='" . $TelNr . "', l_mobil='" . $MobilNr . "',l_fax='" . $FaxNr . "',l_email='" . $email . "'";
    $Update .= "Where l_id ='" . $ID . "';";
    mysqli_query($Con, $Update);
}
// Tabelle komponenten verändern
// Als RaumNr nur die Raumnummer übergeben nicht die ID! Genauso bei der Kompomnenten Art und Lieferantenname
function Komponentenändern($Con, $ID, $Bezeichnung, $RaumNr, $LieferantenName, $Einkaufsdatum, $Gewährleistungsdauer, $Notiz, $Hersteller, $KomponentenName)
{
    //Benutzereingaben werden zur ID umgewandelt
    $RaumID = RaumIDHerausfinden($Con, $RaumNr);
    $LieferantenID = LieferantenIDHerausfinden($Con, $LieferantenName);
    $KomponentenartID = KomponentenartenÄndern($Con, $KomponentenName);

    $Update = "Update komponenten ";
    $Update .= "Set k_bezeichnung='" . $Bezeichnung . "',raeume_r_id='" . $RaumID . "',lieferant_l_id='" . $LieferantenID . "', k_einkaufsdatum='" . $Einkaufsdatum . "',k_gewaehrleistungsdauer='" . $Gewährleistungsdauer . "',k_notiz='" . $Notiz . "',k_hersteller='" . $Hersteller . "',komponentenarten_ka_id='" . $KomponentenartID . "'";
    $Update .= "Where k_id ='" . $ID . "';";
    mysqli_query($Con, $Update);
}

function komponentenAttributÄndern($Con, $ID, $KomponentenattributNamen, $khkatwert)
{
    $KomponentenattributeID = KomponentenattributIDHerausfinden($Con,$KomponentenattributNamen);
    $Update = "Update komponente_hat_attribute ";
    $Update .= "Set komponentenattribute_kat_id='" . $KomponentenattributeID . "',khkat_wert='" . $khkatwert . "'";
    $Update .= "Where komponenten_k_id ='" . $ID . "';";
    mysqli_query($Con, $Update);
}

function AttributÄndern($Con, $ID, $Bezeichnung)
{
    $Update = "Update komponentenattribute Set kat_bezeichnung='" . $Bezeichnung . "' Where kat_id ='" . $ID . "';";
    mysqli_query($Con, $Update);
}

function KomponentenartÄndern($Con, $ID, $KomponentenName)
{
    $Update = "Update komponentenarten Set ka_komponentenart='" . $KomponentenName . "' Where ka_id ='" . $ID . "';";
    mysqli_query($Con, $Update);
}

//Wichtige Select Statements

function RaumIDHerausfinden($Con, $Raumnummer)
{
    $Query = "Select r_id From raeume Where r_Nr='" . $Raumnummer . "';";
    $Result = mysqli_query($Con, $Query);
    foreach ($Result as $Speicher) {
        return (int)$Speicher["r_id"];
    }
}

function LieferantenIDHerausfinden($Con, $Lieferantenname)
{
    $Query = "Select l_ID From lieferant Where l_firmenname='" . $Lieferantenname . "';";
    $Result =  mysqli_query($Con, $Query);
    foreach ($Result as $Speicher) {
        return $Speicher["l_ID"];
    }
}

function KomponentenartenÄndern($Con, $KomponentenName)
{
    $Query = "Select ka_id From komponentenarten Where ka_komponentenart='" . $KomponentenName . "';";
    $Result =  mysqli_query($Con, $Query);
    foreach ($Result as $Speicher) {
        return (int)$Speicher["ka_id"];
    }
}

function KomponentenattributIDHerausfinden($Con, $KomponentenattributName)
{
    $Query = "Select kat_id From komponentenattribute Where kat_bezeichnung='" . $KomponentenattributName . "';";
    $Result =  mysqli_query($Con, $Query);
    foreach ($Result as $Speicher) {
        return (int)$Speicher["kat_id"];
    }
}

?>