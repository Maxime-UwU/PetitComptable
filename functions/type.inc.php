<?php
//vérifie si le fichier a déjà été inclus
require_once 'config.php';

/**
 * Used to get all account of an user
 *
 * @param $name
 * @return array|false
 */

//création de la fonction getAccountList
function getAccountList($name)
{
    $db = db_connect();

    $reqUser = $db->prepare('SELECT * FROM categorie WHERE IDuser = :name ');
    $reqUser->execute(array("name" => $name));

    return $reqUser->fetchAll();
}