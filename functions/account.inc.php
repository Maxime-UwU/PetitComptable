<?php
//vérifie si le fichier a déjà été inclus
require_once 'config.php';

/**
 * Used to get all account of an user
 *
 * @param $idUser
 * @return array|false
 */

//création de la fonction getAccountList
function getAccountList($idUser)
{
    $db = db_connect();

    $reqUser = $db->prepare('SELECT * FROM Compte_bancaire WHERE IDuser = :IDuser ');
    $reqUser->execute(array("IDuser" => $idUser));

    return $reqUser->fetchAll();
}