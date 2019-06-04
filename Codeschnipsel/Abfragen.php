<?PHP
//Funktionen,  welche für die Abfragen dienen:
function Datenbankverbindung()
{
    $username = 'root';
    $passwort = '';
    $hostname = '127.0.0.1';
    $datenbankname = 'itv_v04';
    $Con = mysqli_connect($hostname, $username, $passwort, $datenbankname);
    return $Con;
}

function Komponenten($Con) // Auflistung aller Komponenten:
{
    $Query = "SELECT * FROM komponenten";
    return mysqli_query($Con, $Query);
}

function spezKomponenten($Con, $Komponente) // Auflistung bestimmter Komponenten:
{
    $Query = "SELECT *
    FROM komponenten AS k, komponentenarten AS ka
    WHERE k.komponentenarten_ka_id = ka.ka_komponentenart
    AND ka.ka_komponentenart = ".$Komponente.";";
    return mysqli_query($Con, $Query);
}

function Raeume($Con) // Auflistung aller Räume:
{
    $Query = "SELECT * FROM raeume";
    return mysqli_queri($Con, $Query);
}

function spezRaumKomponente($Con, $Raum) // Auflistung der Komponenten, welche sich in einem bestimmten Raum befinden:
{
    $Query = "SELECT *
    FROM komponenten AS k, raeume AS r
    WHERE k.raeume_r_id = r.r_id
    AND r.r_id=".$Raum.";";
    return mysqli_query($Con, $Query);
}

function RaumSoftware($Con) // Auflistung aller Räume mit Software:
{
    $Query = "SELECT *
    FROM raeume AS r, software_in_raum AS sr
    WHERE r.r_id = sr.sir_r_id";
    return mysqli_query($Con, $Query);
}

function Lieferanten($Con) // Auflistung aller Lieferanten
{
    $Query = "SELECT *
    FROM lieferant";
    return mysqli_query($Con, $Query);
}

function spezLieferantKomponente($Con, $Lieferant) // Auflistung der Komponenten, welche von einem bestimmten Lieferanten (hier: MindFactory) beliefert werden:
{
    $Query = "SELECT *
    FROM komponenten AS k, lieferant AS l
    WHERE l.l_id = k.lieferant_l_id
    AND l.l_firmenname = ".$Lieferant.";";
    return mysqli_query($Con, $Query);
}