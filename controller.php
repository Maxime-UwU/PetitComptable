<?php

require_once 'config.php';

if( isset($_POST['creationCompteBtn'] ) ) {

    $Nom = $_POST["Nom"];
    $Provision = $_POST["Provision"];
    $Type = $_POST["Type"];
    $Devise = $_POST["Devise"];

    //echo $Nom . $Provision . $Type . $Devise;

    // Conditions pour vérifier l'intégrité des données


    if (empty($Nom['Nom']) || empty($Provision['Provision']) || empty($Type['Type']) || empty($Devise['Devise']))
    {
        echo "ERREUR : tous les champs n'ont pas ete renseignés.";
    }


    // Si c'est OK, on ajoute en BDD


    // Connexion BDD
    $db = db_connect();

    $req = $db->prepare( 'INSERT INTO Compte_bancaire (IDuser, NOMcompte, Provision, Type, DeviseCompte) VALUES (:IDuser, :NOMcompte, :Provision, :TypeCompte, :DeviseCompte)' );
    $req->execute( array(
        'IDuser'    => 1,
        'NOMcompte' => $Nom,
        'Provision' => $Provision,
        'TypeCompte' => $Type,
        'DeviseCompte' => $Devise
    ));



    // A retirer apres les test
    //die;


    // Redirection vers mon formulaire
}







/********/



// Vérifie qu'il provient d'un formulaire
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom = $_POST["Nom"];
    $Provision = $_POST["Provision"];

    if (!isset($Nom)){
        die("S'il vous plaît entrez votre nom");
    }


    print "Salut " . $Nom ;
}
?>


<?php
require_once 'config.php';
$db = db_connect();
// Vérifie qu'il provient d'un formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //identifiants mysql
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "ptitcomp";



    if (!isset($name)){
        die("S'il vous plaît entrez votre nom");
    }


    //Ouvrir une nouvelle connexion au serveur MySQL
    $mysqli = new mysqli($host, $username, $password, $database);

    //Afficher toute erreur de connexion
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }


    $sql ="INSERT INTO Compte_bancaire (NomNompte, prevision, Type, DeviseCompte)VALUES ('$Nom','$Provision', '$Type', '$Devise');";

    mysqli_query($db, $sql);


}*/
?>