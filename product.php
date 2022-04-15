<?php
include("src/database/db.php");
session_start();
if (empty($_GET['id'])) {
    header("Location: index.php");
} else {
    $id = $_GET['id'];
}

$product        = (object) select('product', ['idProduct' => $id])[0];
$requirements   = (object) select('system_req', ['idSystemReq' => $product->idSystemRequirements])[0];
$categoryName   = select('productcategory', ['idMainCategory' => $product->idCategory])[0]['categoryName'];
$subCategories  = subCategories($product->idProduct);
$developers     = developers($product->idProduct);
$img            = imgPhotoalbum($product->idProduct);
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
    <title><?= $product->title ?></title>
</head>

<body>
    <?php require("src/include/header.php"); ?>

    <div class="productpage">
        <div class="container">
            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: ' - ';">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item"><a href="/"><?= $categoryName ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $product->title ?></li>
                </ol>
            </nav>
            <p class="name"><?= $product->title ?></p>
            <div class="row" style="margin-bottom: 2em;">
                <div class="col-4 d-flex flex-column">
                    <div class="col">
                        <img src="/img/tovar_index/<?= $product->titleImg ?>" id="prodpic" />
                    </div>
                    <div class="row info_prod_">
                        <div class="col-5">
                            <p class="prodp">Жанр</p>
                        </div>
                        <div class="col">
                            <p class="itog prodp">
                                <?php
                                if ($subCategories != null) {
                                    for ($i = 0; $i < count($subCategories); $i++) {
                                        echo $subCategories[$i]->nameOfTheSubcategory . " ";
                                    }
                                } else {
                                    echo "Отсутсвует";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row info_prod_">
                        <div class="col-5">
                            <p class="prodp">Дата выхода</p>
                        </div>
                        <div class="col">
                            <p class="prodp">
                                <?= dbDate(strtotime($product->releaseDate)) ?>
                            </p>
                        </div>
                    </div>
                    <div class="row info_prod_">
                        <div class="col-5">
                            <p class="prodp">Издатель</p>
                        </div>
                        <div class="col">
                            <p class="itog prodp">
                                <?= $product->publisher ?>
                            </p>
                        </div>
                    </div>
                    <div class="row info_prod_">
                        <div class="col-5">
                            <p class="prodp">Разработчик</p>
                        </div>
                        <div class="col">
                            <p class="itog prodp">
                                <?php
                                if ($developers != null) {
                                    for ($i = 0; $i < count($developers); $i++) {
                                        echo $developers[$i]->developers;
                                        if ($i < count($developers) - 1) echo ", ";
                                    }
                                } else {
                                    echo "Отсутсвует";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-7 prodinf">
                    <div class="row price_product">
                        <a class="btn btn-primary mbut" id="prodbut" href="/src/controllers/addToBasket.php?id=<?= $product->idProduct ?>" role="button">Купить</a>
                        <p class="prodprice"><?= price($id) ?> ₽</p>
                        <p class="fullprice"><?= $product->price ?> ₽</p>
                        <p class="discount proddisc">60%</p>
                    </div>
                    <div class="row info_product">
                        <div class="col-4 d-flex flex-column">
                            <p class="secp">Поддержка языков</p>
                            <p class="secp">Сервис активации</p>
                        </div>
                        <div class="col-2 d-flex flex-column">
                            <p class="itog proditog"><span class="dot"></span> Русский</p>
                            <p class="itog proditog"><span class="dot"></span> Steam</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                        Системные требования
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                        Описание
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content prod" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <p class="secp title_requirements">Минимальные системные требования</p>
                                        <div class="col-4 d-flex flex-column">
                                            <div class="col">
                                                <p class="secp">ОС</p>
                                            </div>
                                            <div class="col">
                                                <p class="secp">Процессор</p>
                                            </div>
                                            <div class="col">
                                                <p class="secp">Оперативная память</p>
                                            </div>
                                            <div class="col">
                                                <p class="secp">Видеокарта</p>
                                            </div>
                                            <div class="col">
                                                <p class="secp">Место на диске</p>
                                            </div>
                                        </div>

                                        <div class="col d-flex flex-column">
                                            <div class="col">
                                                <p><?= $requirements->OS ?></p>
                                            </div>
                                            <div class="col">
                                                <p><?= $requirements->processor ?></p>
                                            </div>
                                            <div class="col">
                                                <p><?= $requirements->dram ?></p>
                                            </div>
                                            <div class="col">
                                                <p><?= $requirements->videocard ?></p>
                                            </div>
                                            <div class="col">
                                                <p><?= $requirements->diskSpace ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade description" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?= $product->description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (count($img) != 0) { ?>
            <p class="mainp">СКРИНШОТЫ</p>

            <div class="container prodcar">
                <!-- Bootstrap 4 -->
                <div class="container">
                    <?php

                    if (count($img) == 1) { ?>
                        <img src="/img/tovar_img/<?= $img[0]['IMG'] ?>" class="d-block w-100" alt="...">
                    <? } else { ?>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php for ($i = 0; $i < count($img); $i++) { ?>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" <?php if ($i == 0) { ?>class="active" aria-current="true" <? } ?> aria-label="Slide <?= ($i + 1) ?>"></button>
                                <? } ?>
                            </div>
                            <div class="carousel-inner">
                                <?php for ($i = 0; $i < count($img); $i++) { ?>
                                    <div class="carousel-item <?php if ($i == 0) { ?>active<? } ?>">
                                        <img src="/img/tovar_img/<?= $img[$i]['IMG'] ?>" class="img-fluid d-block w-100" alt="...">
                                    </div>
                                <? } ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <? } ?>
                </div>
            </div>

        <? } ?>
        <?php require("src/include/footer.php"); ?>
</body>

</html>