<?php
include("../database/db.php");
session_start();
if(empty($_SESSION['auth'])) {
    header('Location: ../../index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style/bootstrap-5.0.1-dist/css/bootstrap-utilities.css" />
    <link rel="stylesheet" type="text/css" href="/style/bootstrap-5.0.1-dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/style/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon" />
    <script src="/style/bootstrap-5.0.1-dist/js/bootstrap.bundle.js"></script>
    <title>Профиль</title>
</head>

<body>
    <?php require("../include/header.php"); ?>

    <p class="mainp">Профиль</p>
    <div class="contentprof">
        <div class="container">
            <div class="row">
                <div class="col">
                <?php require("../include/nav_profile.php"); ?>
                </div>
                <div class="col-8 prof profdiv">
                    <div class="row">
                        <div class="col d-flex justify-content-center ">
                            <div class="d-flex flex-column">
                                <img src="/img/img_avatars/<?= $_SESSION['auth']['image'] ?>" class="rounded-circle" style="width: 150px;" alt="" />
                                <p class="name" id="profpc"><?= $_SESSION['auth']['login'] ?></p>
                            </div>
                        </div>
                        <hr style="height: 2px; color: #66fcf1">
                        <div class="row profdiv" style="margin: 0;">
                            <div class="col d-flex justify-content-center">
                                <div class="d-flex flex-column">
                                    <p class="name" id="profpc"><?= countBy($_SESSION['auth']['id'], 'Игры')?></p>
                                    <p class="name" id="profpc">Игр куплено</p>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <div class="d-flex flex-column">
                                    <p class="name" id="profpc"><?= countBy($_SESSION['auth']['id'], 'Программы')?></p>
                                    <p class="name" id="profpc">Программ куплено</p>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <div class="d-flex flex-column">
                                    <p class="name" id="profpc"><?= countBy($_SESSION['auth']['id'], 'Ключи')?></p>
                                    <p class="name" id="profpc">Ключей для ПО куплено</p>
                                </div>
                            </div>
                            <div class="profdiv"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require("../include/footer.php"); ?>
</body>

</html>