<?php
session_start();
include("../database/db.php");
if(empty($_SESSION['basket'])) {
    header('Location: ../pages/profile.php');
}
$basket = $_SESSION['basket'];
$id = array();
$count = 0;
while ($basket_name = current($basket)) {
    if ($basket_name['add'] == 'true') {
        $id[$count++] = key($basket);
    }
    next($basket);
}

$date = date('Y-m-d');
confirm($_SESSION['auth']['id'], $date, $id);
unset($_SESSION['basket']);
header('Location: ../pages/mypurchases.php');
