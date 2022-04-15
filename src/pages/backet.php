<?php
include("../database/db.php");
session_start();
if (empty($_SESSION['auth'])) {
    header('Location: ../../index.php');
} else if (empty($_SESSION['basket'])) {
    header('Location: ../../index.php');
}
$count_basket_item    = 0;
$basket               = $basket_for_check = $_SESSION['basket'];
$summBasket           = [
    'price'          => null,
    'discount_price' => null
];

while ($check_basket_item = current($basket_for_check)) {
    if ($check_basket_item['add'] == 'true') {
        $count_basket_item += 1;
    }
    next($basket_for_check);
}

if ($count_basket_item == 0) {
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
    <title>Корзина</title>
</head>

<body>
    <?php require("../include/header.php"); ?>
    <p class="mainp">Корзина</p>

    <div class="korz" style="background: rgba(0, 0, 0, 0.7)">
        <!--Корзина с товарами-->
        <div class="container">
            <?php
            while ($basket_name = current($basket)) {
                if ($basket_name['add'] == 'true') {
                    $id         = key($basket);
                    $product    = (object) select('product', ['idProduct' => $id])[0];
                    if ($summBasket['price'] == null) $summBasket['price'] = $product->price;
                    else $summBasket['price']   += $product->price;
                    if ($summBasket['discount_price'] == null) $summBasket['discount_price'] = price($id);
                    else $summBasket['discount_price']    += price($id);
            ?>
                    <hr />
                    <div class="korztov">
                        <div class="row">
                            <div class="col-2 d-flex justify-content-center">
                                <img src="/img/tovar_index/<?= $product->titleImg ?>" />
                            </div>
                            <div class="col-6 d-flex flex-column">
                                <div class="col">
                                    <p class="name"><?= $product->title ?></p>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col" style="margin: 0">
                                            <h6 class="pricet"><?= price($id) ?> ₽</h6>
                                        </div>
                                        <div class="col" style="margin: 0; padding: 0">
                                            <h6 class="fullpricet"><?= $product->price ?> ₽</h6>
                                        </div>
                                        <?php
                                        if ($product->discount != null) { ?>
                                            <div class="col" style="margin: 0; padding: 0">
                                                <h6 class="discount"><?= $product->discount ?>%</h6>
                                            </div>
                                        <? } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-4 d-flex align-items-end flex-column">
                                <button class="close">
                                    <a href="/src/controllers/deletefrombasket.php?id=<?= $id ?>">+</a>
                                </button>
                            </div>
                        </div>
                    </div>
            <?
                }
                next($basket);
            } ?>
            <hr />
        </div>
        <!--Корзина с товарами-->

        <p class="mainp">Оплата заказа</p>

        <!--Оплата заказа-->
        <div class="oplata">
            <div class="container">
                <div class="row">
                    <div class="col-7 sposob">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                    Банковские карты
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    QIWI
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                    ЮMONEY
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                Вы будете перенаправлены на сайт платежной системы для завершения оплаты
                                <p></p>
                                <a href="/src/controllers/confirm.php" class="discount2">Оплатить <?= $summBasket['discount_price'] ?> ₽</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-2 schet">
                        <div class="row d-flex justify-content-center ">
                            <div class="row">
                                <div class="col d-flex flex-column">
                                    <h6 class="price">Сумма</h6>
                                    <h6 class="price">Скидка</h6>
                                </div>
                                <div class="col d-flex flex-column">
                                    <h6 class="price"><?= $summBasket['price'] ?> ₽</h6>
                                    <h6 class="fullprice"><?= $summBasket['price'] - $summBasket['discount_price'] ?> ₽</h6>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row d-flex justify-content-center">
                            <div class="row">
                                <div class="col d-flex flex-column">
                                    <h6 class="price">ИТОГО</h6>
                                </div>
                                <div class="col d-flex flex-column">
                                    <h6 class="itog"><?= $summBasket['discount_price'] ?> ₽</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php require("../include/footer.php"); ?>
</body>

</html>