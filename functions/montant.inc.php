<?php

//Fichier pas fonctionnel !!!!!!!!


//vérifie si le fichier a déjà été inclus
require_once 'config.php';
require_once 'provision.inc.php';

//création de la fonction getMontantOp fonctionne pas
function getMontantOp($IDop)
{
    $db = db_connect();

    $req = $db->prepare('SELECT MONTANTop FROM Operation WHERE IDop = :IDop');
    $req->execute(array('IDop' => $IDop));

    return $req->fetchAll();
}