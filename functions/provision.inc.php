<?php
require_once 'config.php';

function getProvision($IDB){
    $db = db_connect();

    $req = $db->prepare('SELECT Provision FROM Compte_bancaire WHERE IDB = :IDB');
    $req->execute(array('IDB' => $IDB));

    return $req->fetchAll();
}