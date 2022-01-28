<?php

//vérifie si le fichier a déjà été inclus
require_once 'functions/operation.inc.php';


if (isset($_POST['operationBtn'])) {

//Declaration de variable
    $account = $_POST["Compte"];
    $Nom = $_POST["Nom"];
    $Montant = $_POST["Montant"];
    $Date = $_POST["Date"];
    $Categorie = $_POST["Categorie"];

//condition qui vérifie si les éléments dans l'input nom contiennent des chiffres alors il affiche une erreur et quitte la fonction
    if (filter_var($Nom, FILTER_VALIDATE_INT)) {
        echo "ERREUR : Le nom ne peut pas etre composé de chiffre ! retourné sur la page précédant.";
        die;
    } //condition qui verifie si les elements dans l'input Montant ne contient pas de chiffre alors il affiche une erreur et quitte la fonction
    else if (!is_numeric($Montant)) {
        echo "ERREUR : La Montant ne peut pas etre composé de lettre ! retourné sur la page précédant.";
        die;
    } //condition qui verifie si les elements dans l'input Nom  contient des caracteres speciaux alors il affiche une erreur et quitte la fonction
    else if (!ctype_alpha($Nom)) {
        echo "ERREUR : Le nom ne peut contrenir que des lettres ! retourné sur la page précédant.";
        die;
    }

    //condition qui verifie si les elements dans les inputs  contiennent rien alors il affiche une erreur et quitte la fonction
    if (empty($Nom) || empty($account) || empty($Montant) || empty($Date)  || empty($Categorie)) {
        echo "ERREUR : tous les champs n'ont pas ete renseignés ! retourné sur la page précédant.";
        die;
    } //condition qui renvoie sur le dashboard
    else {
        header("Location:dashboard.php");
    }
//apelle des la fonction createOperation
    createOperation($Nom, $Montant, $Date, $account);

}
