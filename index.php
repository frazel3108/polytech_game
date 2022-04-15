<?php
include("src/database/db.php");
session_start();
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
    <title>Politech shop</title>
</head>

<body>
    <?php require("src/include/header.php"); ?>

    <?php require("src/include/slider.php"); ?>

    <!--Активные кнопки(Новинки, Предзаказы...)-->
    <div class="container novinki">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <a href="#" class="btn c-button">Новинки</a>
            </div>
            <div class="col">
                <a href="#" class="btn c-button">Предзаказы</a>
            </div>
            <div class="col">
                <a href="#" class="btn c-button">Лидеры продаж</a>
            </div>
            <div class="col">
                <a href="#" class="btn c-button">Скидки</a>
            </div>
        </div>
    </div>

    <!--Таблица товаров-->
    <div class="container categories">
        <div class="row row-cols-6 g-4">
            <?php
            $products = select('product');
            for ($i = 0; $i < count($products); $i++) {
                if ($products[$i]['idProduct'] == 2) continue;
                if ($products[$i]['idProduct'] == 11) continue;
                if ($products[$i]['idProduct'] == 12) continue;
                if ($products[$i]['idProduct'] == 13) continue;
            ?>

                <div class="col tovar" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9)), url(/img/tovar_index/<?= $products[$i]['titleImg'] ?>)">
                    <a class="acat" href="/product.php?id=<?= $products[$i]['idProduct'] ?>">
                        <div class="row d-flex flex-column">
                            <div class="col">
                                <p class="pcatt"><?= $products[$i]['title'] ?></p>
                            </div>
                            <div class="col">
                                <div class="row" id="catrow">
                                    <div class="col">
                                        <h6 class="mainprice">
                                            <?= price($products[$i]['idProduct']) ?> ₽</h6>
                                    </div>
                                    <?php if ($products[$i]['discount'] !== null) { ?>
                                        <div class="col">
                                            <h6 class="maindisc"><?= $products[$i]['discount'] ?> %</h6>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>

    </div>

    <div class="d-flex justify-content-center vibor">
        <div class="row">
            <div class="col">
                <div class="nashbl">
                    <h1 class="nash">НАШ ВЫБОР</h1>
                </div>
            </div>
        </div>
    </div>

    <!--4 пикчи-->
    <div class="container fpic">
        <div class="row">
            <div class="col">
                <div class="col dayz" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9)), url(/img/tovar_img/<?= imgPhotoalbum($products[10]['idProduct'])[0]['IMG'] ?>)">
                    <a class="acat" href="/product.php?id=<?= $products[10]['idProduct'] ?>">
                        <div class="row d-flex flex-column">
                            <div class="col">
                                <p class="pcat" id="bigpic"><?= $products[10]['title'] ?></p>
                            </div>
                            <div class="col">
                                <div class="row" id="bigpic2">
                                    <div class="col-2">
                                        <h6 class="mainprice"><?= price($products[10]['idProduct']) ?> ₽</h6>
                                    </div>
                                    <?php if ($products[10]['discount'] !== null) { ?>
                                        <div class="col">
                                            <h6 class="maindisc"><?= $products[10]['discount'] ?> %</h6>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col tes" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9)), url(/img/tovar_img/<?= imgPhotoalbum($products[12]['idProduct'])[0]['IMG'] ?>)">
                    <a class="acat" href="/product.php?id=<?= $products[12]['idProduct'] ?>">
                        <div class="row d-flex flex-column">
                            <div class="col">
                                <p class="pcat" id="smallpic"><?= $products[12]['title'] ?></p>
                            </div>
                            <div class="col">
                                <div class="row" id="smallpic2">
                                    <div class="col-2">
                                        <h6 class="mainprice"><?= price($products[12]['idProduct']) ?> ₽</h6>
                                    </div>
                                    <?php if ($products[10]['discount'] !== null) { ?>
                                        <div class="col">
                                            <h6 class="maindisc"><?= $products[12]['discount'] ?> %</h6>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="col tes img-fluid" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9)), url(/img/tovar_img/<?= imgPhotoalbum($products[11]['idProduct'])[0]['IMG'] ?>)">
                    <a class="acat" href="/product.php?id=<?= $products[11]['idProduct'] ?>">
                        <div class="row d-flex flex-column">
                            <div class="col">
                                <p class="pcat" id="smallpic"><?= $products[11]['title'] ?></p>
                            </div>
                            <div class="col">
                                <div class="row" id="smallpic2">
                                    <div class="col-2">
                                        <h6 class="mainprice"><?= price($products[11]['idProduct']) ?> ₽</h6>
                                    </div>
                                    <?php if ($products[10]['discount'] !== null) { ?>
                                        <div class="col">
                                            <h6 class="maindisc"><?= $products[11]['discount'] ?> %</h6>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col dayz" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9)), url(/img/tovar_img/<?= imgPhotoalbum($products[1]['idProduct'])[0]['IMG'] ?>)">
                    <a class="acat" href="/product.php?id=<?= $products[1]['idProduct'] ?>">
                        <div class="row d-flex flex-column">
                            <div class="col">
                                <p class="pcat" id="bigpic"><?= $products[1]['title'] ?></p>
                            </div>
                            <div class="col">
                                <div class="row" id="bigpic2">
                                    <div class="col-2">
                                        <h6 class="mainprice"><?= price($products[1]['idProduct']) ?> ₽</h6>
                                    </div>
                                    <?php if ($products[10]['discount'] !== null) { ?>
                                        <div class="col">
                                            <h6 class="maindisc"><?= $products[1]['discount'] ?> %</h6>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php require("src/include/footer.php"); ?>
</body>

</html>