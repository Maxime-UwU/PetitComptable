<?php
require_once 'config.php';
require_once 'provision.inc.php';
require_once 'montant.inc.php';

function createOperation( $Nom, $Montant, $Date, $account ) {
    // Connexion BDD
    $db = db_connect();

    $req = $db->prepare( 'INSERT INTO Operation (IDB, IDc, NOMop, MONTANTop, DATEop) 
    VALUES (:IDB, :IDc, :NOMop, :MONTANTop, :DATEop)');
    $req->execute( array(
        'IDB' => $account,
        'IDc' => 1,
        'NOMop' => $Nom,
        'MONTANTop' => $Montant,
        'DATEop' => $Date,
    ));
    /*$reqOp = $db->prepare('SELECT IDop FROM Operation WHERE IDB = ?');
    $reqOp->execute(array($account));
    $data = $reqOp->fetch();

    $provision = getProvision($account);
    var_dump($data);
    echo getMontantOp($data);*/
}