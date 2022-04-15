<?php
$conn = new mysqli("polytech-game", "root", "", "gameshop");

if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}


