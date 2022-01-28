<?php
require_once 'config.php';
require_once 'provision.inc.php';

function getMontantOp($IDop){
    $db = db_connect();

    $req = $db->prepare('SELECT MONTANTop FROM Operation WHERE IDop = :IDop');
    $req->execute(array('IDop' => $IDop));

    return $req->fetchAll();
}