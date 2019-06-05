<?php
require_once 'DBConnect.php';

class SQLInsert
{
    /**
     * @var DBConnect
     */
    protected $DBConnect;

    public function __construct()
    {
        $this->DBConnect = new DBConnect();
    }

    function komponenteHinzufuegen($bezeichnung, $raumID, $lieferantID, $einkaufsDatum, $gewaehrleistungsDauer, $notiz, $hersteller, $komponentenArt)
    {
        $con = $this->DBConnect->connect();
        $Insert = "INSERT INTO komponenten (
                k_bezeichnung, 
                raeume_r_id, 
                lieferant_l_id, 
                k_einkaufsdatum, 
                k_gewaehrleistungsdauer, 
                k_notiz,
                k_hersteller, 
                komponentenarten_ka_id
                ) VALUES (
                '". $bezeichnung ."', 
                '". $raumID ."', 
                '". $lieferantID .",                
                '". $einkaufsDatum ."', 
                '". $gewaehrleistungsDauer .", 
                '". $notiz ."', 
                '". $hersteller ."', 
                '". $komponentenArt ."';";
        mysqli_query($con, $Insert);
        mysqli_close($con);
    }

    function khaHinzufuegen($komponenten_k_id, $komponentenattribute_kat_id, $wert)
    {
        $con = $this->DBConnect->connect();
        $Insert = "INSERT INTO komponente_hat_attribute (
                komponenten_k_id,
                komponentenattribute_kat_id,
                khkat_wert
                ) VALUES (
                ". $komponenten_k_id .", 
                ". $komponentenattribute_kat_id .",
                '". $wert ."');";

        mysqli_query($con, $Insert);
        mysqli_close($con);
    }
}