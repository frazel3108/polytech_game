<?php
session_start();
include("../database/db.php");
if (empty($_POST)) {
    header('Location: ../../index.php');
}

global $conn;

$id             = $_SESSION['auth']['id'];
$login          = $_POST['login'];
$email          = $_POST['email'];
$password_new   = $_POST['password_new'];
$password       = $_SESSION['auth']['password'];

$sql = (object) [];

tt($_POST['password_old']);
tt($password);

if (!empty($_POST['password_old'])) {
    if ($_POST['password_old'] == $password) {
        $sql = $conn->prepare("UPDATE `users` SET `login` = ?, `email` = ?, `password` = ? WHERE `users`.`id` = ?");
        $sql->bind_param('sssi', $login, $email, $password_new, $id);
        $sql->execute();
        $_SESSION['auth']['login']    = $login;
        $_SESSION['auth']['email']    = $email;
        $_SESSION['auth']['password'] = $password_new;
    } else {
        header('Location: ../pages/personal_information.php');
    }
} else {
    $sql = $conn->prepare("UPDATE `users` SET `login` = ?, `email` = ? WHERE `users`.`id` = ?");
    $sql->bind_param('ssi', $login, $email, $id);
    $sql->execute();
    $_SESSION['auth']['login'] = $login;
    $_SESSION['auth']['email'] = $email;
}
header('Location: ../pages/personal_information.php');
