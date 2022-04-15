<?php
include("../database/db.php");
session_start();
if (empty($_SESSION['auth'])) {
    header('Location: ../../index.php');
}

$idBasket             = array_reverse(select('basket', ['idUserBasket' => $_SESSION['auth']['id']]));
if ($idBasket != null) {
    for ($i = 0; $i < count($idBasket); $i++) {
        $idOrders[]   = select('orderbasket', ['idOrder' => $idBasket[$i]['idBasket']]);
    }
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
    <title>Мои покупки</title>
</head>

<body>
    <?php require("../include/header.php"); ?>
    <p class="mainp">Мои покупки</p>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php require("../include/nav_profile.php"); ?>
                </div>
                <div class="col-9">
                    <?php
                    if ($idBasket != null) {
                        for ($i = 0; $i < count($idBasket); $i++) { ?>
                            <div class="row">
                                <hr class="hr_basket" />
                                <div class="col-8 d-flex flex-column num">
                                    <div class="col">
                                        <p class="name name_number_basket">Номер заказа #<?= $idBasket[$i]['idBasket'] ?></p>
                                    </div>
                                    <div class="col">
                                        <p></p>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col" style="margin: 0">
                                                <h6 class="pricet">Информация о заказе</h6>
                                                <?php
                                                for ($j = 0; $j < count($idOrders[$i]); $j++) {
                                                    $product_temp = select('product', ['idProduct' => $idOrders[$i][$j]['idOrderProduct']])[0];
                                                ?>
                                                    <div class="d-flex info_orders">
                                                        <a href="/product.php?id=<?= $product_temp['idProduct'] ?>"><?= $product_temp['title'] ?></a>
                                                        <p><?= price($product_temp['idProduct']) ?>  ₽</p>
                                                    </div>
                                                <? } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-end flex-column">
                                    <h4 class='date_info_orders'>
                                        <?= dbDate(strtotime($idBasket[$i]['dataOrder'])) ?>
                                    </h4>
                                </div>
                                <hr class="hr_basket" />
                            </div>
                    <? }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php require("../include/footer.php"); ?>
</body>

</html>