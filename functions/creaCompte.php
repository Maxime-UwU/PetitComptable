<?php
//vérifie si le fichier a déjà été inclus
require_once 'config.php';

//création de la fonction createOperation
function createOperation($Nom, $Provision, $Type, $Devise)
{
    // Connexion BDD
    $db = db_connect();

    //Requête permettant d'envoyer les elements remplies dans input
    $req = $db->prepare('INSERT INTO Compte_bancaire (IDuser, NOMcompte, Provision, Type, DeviseCompte) VALUES (:IDuser, :NOMcompte, :Provision, :TypeCompte, :DeviseCompte)');
    //execution de la requête
    $req->execute(array(
        'IDuser' => 1,
        'NOMcompte' => $Nom,
        'Provision' => $Provision,
        'TypeCompte' => $Type,
        'DeviseCompte' => $Devise
    ));
}