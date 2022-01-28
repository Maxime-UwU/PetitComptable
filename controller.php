<?php
//vérifie si le fichier a déjà été inclus
require_once 'config.php';

//session_start();
/*
if (!isset($_SESSION['user']))*/


//function permettant de limiter le nombre de compte à 10

function limit($IDuser)
{

    //connection a la bdd
    $db = db_connect();

    //requete permettant de recuperrer les donnees
    $reqUser = $db->prepare('SELECT * FROM Compte_bancaire WHERE IDuser = ?');

    $sup = array("");
    //execution de la requete
    $reqUser->execute(array($IDuser));

    //cration d'une variable permettant de compter le nombre de ligne
    $data = $reqUser->rowCount();

    //condition que lorsque la variable data est superieur a 10 alors il affiche une erreur et de quitter le script
    if ($data > 10) {
        echo "ERREUR : Vous avez atteint la limite maximum de compte bancaire.";
        die();
    }

}


if (isset($_POST['creationCompteBtn'])) {


//Declaration de variable
    $Nom = $_POST["Nom"];
    $Provision = $_POST["Provision"];
    $Type = $_POST["Type"];
    $Devise = $_POST["devise"];


//condition qui verifie si les elements dans l'input Nom contient des chiffres alors il affiche une erreur et quitter le script
    if (filter_var($Nom, FILTER_VALIDATE_INT)) {
        echo "ERREUR : Le nom ne peut pas etre composé de chiffre ! retourné sur la page précédante.";
        die;


    } //condition qui verifie si les elements dans l'input Provision ne contient pas de chiffre alors il affiche une erreur et quitter le script
    else if (!is_numeric($Provision)) {
        echo "ERREUR : La provision ne peut pas etre composé de lettre ! retourné sur la page précédante.";
        die;
    } //condition qui verifie si les elements dans l'input Nom  contient des caracteres speciaux alors il affiche une erreur et quitter le script

    else if (!ctype_alpha($Nom)) {
        echo "ERREUR : Le nom ne peut contrenir que des lettres ! retourné sur la page précédante.";
        die;
    }

    //condition qui verifie si les elements dans les inputs  contiennent rien alors il affiche une erreur et quitter le script

    if (empty($Nom) || empty($Provision) || empty($Type) || empty($Devise)) {
        echo "ERREUR : tous les champs n'ont pas ete renseignés ! retourné sur la page précédante.";
        die;
    } //condition qui renvoie sur le dashboard

    else {

        header("Location:dashboard.php");
    }

//Apelle de la fonction limit
    limit(1);


    // Connexion BDD
    $db = db_connect();

    //requette qui permet d'envoyer les donnees inputs dans la bdd
    $req = $db->prepare('INSERT INTO Compte_bancaire (IDuser, NOMcompte, Provision, Type, DeviseCompte) VALUES (:IDuser, :NOMcompte, :Provision, :TypeCompte, :DeviseCompte)');
    //execute la requette
    $req->execute(array(
        'IDuser' => 1,
        'NOMcompte' => $Nom,
        'Provision' => $Provision,
        'TypeCompte' => $Type,
        'DeviseCompte' => $Devise
    ));


}
?>