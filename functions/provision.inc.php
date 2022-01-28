<?php

//Fichier pas fonctionnel !!!!!!!!


//vérifie si le fichier a déjà été inclus
require_once 'config.php';

//création de la fonction getProvision
function getProvision($IDB)
{
    $db = db_connect();

    $req = $db->prepare('SELECT Provision FROM Compte_bancaire WHERE IDB = :IDB');
    $req->execute(array('IDB' => $IDB));

    return $req->fetchAll();
}