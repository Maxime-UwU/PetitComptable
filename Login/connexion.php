<?php
session_start();
require_once 'config.php';
$db = db_connect();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $checkout = $db->prepare('SELECT IDuser, EMAILuser, MDPuser FROM Utilisateur WHERE EMAILuser = ?');
    $checkout->execute(array($email));
    $data = $checkout->fetch();

    $row = $checkout->rowCount();
    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $password = hash('sha256', $password);
            if ($data['MDPuser'] === $password) {
                $_SESSION['user'] = $data['IDuser'];
                header('Location:landing.php');
            } else header('Location:index.php?login_err=password');
        } else header('Location:index.php?login_err=email');
    } else header('Location:index.php?login_err=already');

} else header('Location:index.php');