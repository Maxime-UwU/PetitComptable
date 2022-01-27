<?php

require_once 'functions/operation.inc.php';

if( isset($_POST['operationBtn'] ) ) {

    $account = $_POST["Compte"];
    $Nom = $_POST["Nom"];
    $Montant = $_POST["Montant"];
    $Date = $_POST["Date"];

    createOperation( $Nom, $Montant, $Date, $account );

}
?>