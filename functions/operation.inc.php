<?php
//vérifie si le fichier a déjà été inclus
require_once 'config.php';

//création de la fonction createOperation
function createOperation($Nom, $Montant, $Date, $account,)
{
    // Connexion BDD
    $db = db_connect();

    //Requête qui permet d'envoyer les données inputs dans la bdd
    $req = $db->prepare('INSERT INTO Operation (IDB, IDc, NOMop, MONTANTop, DATEop) VALUES (:IDB, :IDc, :NOMop, :MONTANTop, :DATEop)');
    //execute la Requête
    $req->execute(array(
        'IDB' => $account,
        'IDc' => 1,
        'NOMop' => $Nom,
        'MONTANTop' => $Montant,
        'DATEop' => $Date,
    ));

}