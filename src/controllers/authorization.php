<?php
session_start();
include("../database/db.php");

if (!empty($_POST['email'])) {
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    $user = signUp($email, $password);

    if ($user != null) {
        $_SESSION['auth'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email'],
            "image" => $user['image'],
            "password" => $user['password']
        ];
        header('Location: ../../index.php');
    } else {
        header('Location: ../../index.php');
    }
} else if ($_GET['email']) {
    $email    = trim($_GET['email']);
    $password = trim($_GET['password']);

    $user = signUp($email, $password);

    if ($user != null) {
        $_SESSION['auth'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email'],
            "image" => $user['image'],
            "password" => $user['password']
        ];
        header('Location: ../../index.php');
    } else {
        header('Location: ../../index.php');
    }

} else {
    header('Location: ../../index.php');
}
