<?php
require_once 'config.php';

function createOperation( $Nom, $Montant, $Date, $account ) {
    // Connexion BDD
    $db = db_connect();

    $req = $db->prepare( 'INSERT INTO Operation (IDB, IDc, NOMop, MONTANTop, DATEop) VALUES (:IDB, :IDc, :NOMop, :MONTANTop, :DATEop)');
    $req->execute( array(
        'IDB' => $account,
        'IDc' => 1,
        'NOMop' => $Nom,
        'MONTANTop' => $Montant,
        'DATEop' => $Date,
    ));
}