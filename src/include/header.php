<header>
    <div class="container">
        <div class="row">
            <div class="col-sm logo">
                <a href="/">
                    <img src="/img/logo.png" width="280px" height="50px" />
                </a>
            </div>

            <div class="col d-flex justify-content-center">
                <div class="poster">
                    <button class="btn dropdown-toggle spis" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">Каталог</button>
                    <div class="descr">
                        <div class="container">
                            <div class="row">
                                <div class="col d-flex flex-column">
                                    <a class="azag" href="/src/pages/categories.php">Категории игр</a>
                                    <p></p>
                                    <a class="aspis" href="#">Шутеры</a>
                                    <a class="aspis" href="#">MOBA</a>
                                    <a class="aspis" href="#">Стратегии</a>
                                    <a class="aspis" href="#">Экшен</a>
                                    <a class="aspis" href="#">Спорт</a>
                                    <a class="aspis" href="#">Симуляторы</a>
                                    <a class="aspis" href="#">Приключения</a>
                                    <p></p>
                                    <a class="azag2" href="#">Все игры</a>
                                </div>
                                <div class="col d-flex flex-column">
                                    <a class="azag" href="#">Программы</a>
                                    <p></p>
                                    <a class="aspis" href="#">Офисные</a>
                                    <a class="aspis" href="#">Антивирусные</a>
                                    <a class="aspis" href="#">Adobe</a>
                                    <p></p>
                                    <a class="azag2" href="#">Все программы</a>
                                </div>
                                <div class="col d-flex flex-column">
                                    <a class="azag" href="#">Ключи для ПО</a>
                                    <p></p>
                                    <a class="aspis" href="#">Windows</a>
                                    <a class="aspis" href="#">MacOS</a>
                                    <p></p>
                                    <a class="azag2" href="#">Все ключи</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="input-group rounded">
                    <input type="search" class="form-control poisk" placeholder="Поиск..." aria-label="Search" aria-describedby="search-addon" />
                </div>
            </div>

            <?php

            if (!empty($_SESSION['auth'])) { ?>
                <div class="col-sm-1 d-flex justify-content-center">
                    <a href="/src/pages/profile.php">
                        <img src="/img/img_avatars/default.png" id="ava" />
                    </a>
                </div>
            <? } else { ?>
                <div class="col-sm-2 d-flex flex-column vhodreg">
                    <div class="css-modal-details">
                        <a href="" data-bs-toggle="modal" data-bs-target="#signIN">Вход</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <hr class="vhod ">
                    </div>
                    <div class="css-modal-details">
                        <a href="" data-bs-toggle="modal" data-bs-target="#registration">Регистрация</a>
                    </div>
                </div>
            <? } ?>

            <div class="modal fade" id="signIN" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-5 shadow">
                        <div class="modal-header p-5 pb-4 border-bottom-0">
                            <h2 class="fw-bold mb-0 ">Вход</h2>
                            <button type="button" class="btn-close closereg" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body p-5 pt-0">
                            <form action="/src/controllers/authorization.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Войти</button>
                                <div class="row">
                                    <div class="col-8">
                                        <small class="text-muted">Забыли пароль?</small>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-link" data-bs-target="#registration" data-bs-toggle="modal" data-bs-dismiss="modal">Регистрация</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="registration" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-5 shadow">
                        <div class="modal-header p-5 pb-4 border-bottom-0">
                            <h2 class="fw-bold mb-0">Регистрация</h2>
                            <button type="button" class="btn-close closereg" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body p-5 pt-0">
                            <form action="/src/controllers/reg.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" name="login" class="form-control rounded-4" id="floatingInput" placeholder="NickName">
                                    <label for="floatingInput">NickName</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Зарегистрироваться</button>
                                <div style="display: flex; align-items: center; margin-bottom: 1em">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input regch" name="legal_information" type="checkbox" id="flexSwitchCheckChecked">
                                    </div>
                                    <p id="sogl">Я даю согласие на обработку <a href="/src/pages/legal_information.php">персональных данных</a></p>
                                </div>
                                <div style="text-align: center;">>
                                    <small class="text-muted">
                                        <a class="btn btn-link backToSignIN" data-bs-target="#signIN" data-bs-toggle="modal" data-bs-dismiss="modal">Вернуться ко входу</a>
                                    </small>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-1 d-flex justify-content-end">
                <a href="/src/pages/backet.php">
                    <img class="cart" src="/img/059-cart 2.png" style="padding-bottom: 5px" />
                </a>
            </div>
        </div>
    </div>
</header>