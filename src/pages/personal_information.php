<?php
include("../database/db.php");
session_start();
if (empty($_SESSION['auth'])) {
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
    <title>Личные данные</title>
</head>

<body>
    <?php require("../include/header.php"); ?>
    <p class="mainp">Личные данные</p>
    <div class="contentprof" style="background: rgba(0, 0, 0, 0.7)">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php require("../include/nav_profile.php"); ?>
                </div>

                <div class="col-9 own">
                    <form action="/src/controllers/change-data.php" method="post">
                        <div class="row">
                            <div class="col-9 d-flex flex-column">
                                <div class="col">
                                    <p class="name">Личные данные</p>
                                </div>
                                <div class="col">
                                    <div class="row owndiv">
                                        <div class="col" style="margin: 0">
                                            <h6 class="pricet">Никнейм:</h6>
                                        </div>
                                        <div class="col" style="margin: 0; padding: 0">
                                            <input type="text" name="login" class="form-control myform" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Никнейм" value="<?= $_SESSION['auth']['login'] ?>">
                                        </div>
                                    </div>
                                    <div class="row owndiv">
                                        <div class="col" style="margin: 0">
                                            <h6 class="pricet">E-mail:</h6>
                                        </div>
                                        <div class="col" style="margin: 0; padding: 0">
                                            <input type="email" name="email" class="form-control myform" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" value="<?= $_SESSION['auth']['email'] ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col" style="padding-top: 30px;">
                                    <p class="name">Смена пароля</p>
                                </div>
                                <div class="col">
                                    <div class="row owndiv">
                                        <div class="col ownm">
                                            <h6 class="pricet">Текущий пароль:</h6>
                                        </div>
                                        <div class="col ownm ownp">
                                            <input type="password" name="password_old" class="form-control myform" id="exampleInputPassword1" placeholder="Пароль">
                                        </div>
                                    </div>
                                    <div class="row owndiv" style="padding-bottom: 30px;">
                                        <div class="col ownm">
                                            <h6 class="pricet">Новой пароль:</h6>
                                        </div>
                                        <div class="col ownm ownp">
                                            <input type="password" name="password_new" class="form-control myform" id="exampleInputPassword1" placeholder="Пароль">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mbut" role="button">Сохранить</button>
                                </div>
                            </div>
                            <div class="col-3 justify-content-end">
                                <img src="/img/img_avatars/default.png" class="rounded-circle" style="width: 150px;margin-top: 40px;" alt="" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php require("../include/footer.php"); ?>
</body>

</html>