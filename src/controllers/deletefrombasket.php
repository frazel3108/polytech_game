<?php 
session_start();
include("../database/db.php");
if (empty($_GET['id'])) {
    header("Location: index.php");
} else {
    $id = $_GET['id'];
}

$_SESSION['basket'][$id]['add'] = false;

header("Location: ../pages/backet.php");
