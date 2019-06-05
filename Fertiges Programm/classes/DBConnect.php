<?php

class DBConnect
{
    function connect(){
        ########## MySql details (Replace with yours) #############
        $username = 'root';
        $password = '';
        $hostname = '127.0.0.1';
        $databasename = 'itv_v04'; // Die Bezeichnung der Datenbank

        //connect to database
        $Con = new mysqli($hostname, $username, $password, $databasename);
        if(!$Con){
            exit("Datenbank Verbindungsfehler: ".mysqli_connect_error());
        }
        //Set_Charset --> ergänzt, damit Umlaute bei "Zutritt gewährt" korrekt in die DB geschrieben werden
        $Con->set_charset("utf8");

        return $Con;
    }
}