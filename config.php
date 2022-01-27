<?php
function db_connect (){
    try {
        $host = "localhost";
        $dbname = "ptitcomp";
        $user = "root";
        $password = "root";

        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $db;
    }
    catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
}

?>