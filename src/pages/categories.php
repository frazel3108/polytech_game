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
    <title>Категории</title>
</head>

<body>
    <?php require("../include/header.php"); ?>

    <?php require("../include/slider.php"); ?>


    <p class="mainp">Категории игр</p>

    <div class="container categories">
        <div class="row catblock">
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat1.png);">
                <a class="acat" href="#">
                    <p class="pcat">Гонки</p>
                </a>
            </div>
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat2.png);">
                <a class="acat" href="#">
                    <p class="pcat">Шутеры</p>
                </a>
            </div>
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat3.png);">
                <a class="acat" href="#">
                    <p class="pcat">Фэнтези</p>
                </a>
            </div>
        </div>

        <div class="row catblock">
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat4.png);">
                <a class="acat" href="#">
                    <p class="pcat">Стратегии</p>
                </a>
            </div>
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat5.png);">
                <a class="acat" href="#">
                    <p class="pcat">Спорт</p>
                </a>
            </div>
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat6.png);">
                <a class="acat" href="#">
                    <p class="pcat">Выживание</p>
                </a>
            </div>
        </div>

        <div class="row catblock">
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat7.png);">
                <a class="acat" href="#">
                    <p class="pcat">Зомби</p>
                </a>
            </div>
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat8.png);">
                <a class="acat" href="#">
                    <p class="pcat">РПГ</p>
                </a>
            </div>
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat9.png);">
                <a class="acat" href="#">
                    <p class="pcat">Аниме</p>
                </a>
            </div>
        </div>

        <div class="row catblock">
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat10.png);">
                <a class="acat" href="#">
                    <p class="pcat">Симуляторы</p>
                </a>
            </div>
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat11.png);">
                <a class="acat" href="#">
                    <p class="pcat">Файтинг</p>
                </a>
            </div>
            <div class="col-md-4 categoriesimg" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.9)),url(/img/img_categories/cat12.png);">
                <a class="acat" href="#">
                    <p class="pcat">Инди</p>
                </a>
            </div>
        </div>


        <?php require("../include/footer.php"); ?>
</body>

</html>