<?php



require_once 'config.php';

session_start();/*
if (!isset($_SESSION['user']))*/

function limit ($IDuser) {

    $db = db_connect();

    $reqUser = $db->prepare('SELECT * FROM Compte_bancaire WHERE IDuser = ?');

    $sup = array ("");
    $reqUser->execute(array( $IDuser));

    $data = $reqUser->rowCount();

    if ($data > 10) {
        echo "ERREUR : Vous avez atteint la limite maximum de compte bancaire.";
        die();
    }

}

function supIDB ($IDB){

    $db = db_connect();

    $reqUser = $db->prepare('SELECT * FROM Compte_bancaire WHERE IDB = ?');

    $reqUser->execute(array($IDB));


}

/* $db = db_connect();
 $req = $db->prepare( 'SELECT IDB FROM Compte_bancaire ' );
 $req->execute( array($IDuser));
 $stockIDuse = fetch
$stockIDuser = array()*/



if( isset($_POST['creationCompteBtn'] ) ) {



    $Nom = $_POST["Nom"];
    $Provision = $_POST["Provision"];
    $Type = $_POST["Type"];
    $Devise = $_POST["devise"];


    if (filter_var($Nom, FILTER_VALIDATE_INT)){
        echo "ERREUR : Le nom ne peut pas etre composé de chiffre.";
        die;
    }

    else if ( !is_numeric( $Provision) ){
        echo "ERREUR : La provision ne peut pas etre composé de lettre.";
        die;
    }

    else if (!ctype_alpha($Nom)){
        echo "ERREUR : Le nom ne peut contrenir que des lettres.";
        die;
    }

    // Conditions pour vérifier l'intégrité des données


    if (empty($Nom) || empty($Provision) || empty($Type) || empty($Devise))
    {
        echo "ERREUR : tous les champs n'ont pas ete renseignés.";
        die;
    }


    limit(1);

    // Si c'est OK, on ajoute en BDD


    // Connexion BDD
    $db = db_connect();

    $req = $db->prepare( 'INSERT INTO Compte_bancaire (IDuser, NOMcompte, Provision, Type, DeviseCompte) VALUES (:IDuser, :NOMcompte, :Provision, :TypeCompte, :DeviseCompte)' );
    echo $Nom . $Provision . $Type . $Devise;
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