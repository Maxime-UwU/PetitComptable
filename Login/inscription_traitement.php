<?php
session_start();
require_once 'config.php';
$db = db_connect();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

echo "IDuser " . $_POST['IDuser'];
echo "email " . $_POST['email'];
echo "password " . $_POST['password'];
echo "password_retype " . $_POST['password_retype'];

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
    //$IDuser = htmlspecialchars($_POST['IDuser']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    $checkout = $db->prepare('SELECT EMAILuser, MDPuser FROM Utilisateur WHERE EMAILuser = ?');
    $checkout->execute(array($email));
    $data = $checkout->fetch();
    $row = $checkout->rowCount();

    $email = strtolower($email);

    if ($row == 0) {
        //if(strlen($IDuser) <= 100)
        //{
        if (strlen($email) <= 100) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo $password;
                echo $password_retype;
                if ($password == $password_retype) {
                    $password = hash('sha256', $password);
                    //$ip = $_SERVER['REMOTE_ADDR'];

                    $insert = $db->prepare('INSERT INTO Utilisateur( EMAILuser, MDPuser) VALUES ( :EMAILuser, :MDPuser)');
                    $insert->execute(array(
                        //'IDuser' => $IDuser,
                        'EMAILuser' => $email,
                        'MDPuser' => $password
                    ));
                    header('Location: inscription.php?reg_err=success');
                } else header('Location: inscription.php?reg_err=password');

            } else header('Location: inscription.php?reg_err=email');

        } else header('Location: inscription.php?reg_err=email_length');

        //}else header('Location: inscription.php?reg_err=pseudo_length');

    } else header('Location: inscription.php?reg_err=already');
}
