<?php
session_start();
include("../database/db.php");
if (empty($_POST)) {
    header('Location: ../../index.php');
}

if ($_POST['legal_information'] == 'on') {
    $login          = $_POST['login'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $img            = "default.png";
    $count_valid    = validateUser($login, $email);
    if ($count_valid == true) {
        $stmt   = $conn->prepare("INSERT INTO users (login, email, image, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $login, $email, $img, $password);
        $stmt->execute();
        header('Location: authorization.php?email=' . $email . '&password=' . $password);
    } else {
        header('Location: ../../index.php');
    }
} else {
    header('Location: ../../index.php');
}

