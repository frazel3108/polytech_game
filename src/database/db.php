<?php

require('connect.php');

function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function select($table, $params = [])
{
    global $conn;

    if (!empty($params)) {
        $sql = "SELECT * FROM $table";
        $i = 0;
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key = '$value'";
            } else {
                $sql = $sql . " AND $key = '$value'";
            }
            $i++;
        }
    } else {
        $sql = "SELECT * FROM $table";
    }



    $query = $conn->query($sql);
    return $query->fetch_all(MYSQLI_ASSOC);
}

function price($id)
{
    global $conn;

    $sql = "SELECT price, discount FROM product WHERE idProduct = $id";

    $query = $conn->query($sql);
    $result = $query->fetch_object();
    if ($result->discount !== null) {
        $price = ceil(($result->price * $result->discount) / 100);
    } else {
        $price = $result->price;
    }
    return $price;
}

function imgPhotoalbum($id)
{
    global $conn;

    $sql = "SELECT IMG FROM photoalbum WHERE idProduct = $id";
    $query = $conn->query($sql);
    return $query->fetch_all(MYSQLI_ASSOC);
}

function subCategories($id)
{
    global $conn;
    $sub = [];
    $sql = "SELECT idCategorySubcategory FROM subcategories WHERE idProduct = $id";
    $query = $conn->query($sql);
    $subcategories = $query->fetch_all(MYSQLI_ASSOC);
    for ($i = 0; $i < count($subcategories); $i++) {
        $sql = "SELECT nameOfTheSubcategory FROM subcategory WHERE idSubcategory = " . $subcategories[$i]['idCategorySubcategory'];
        $query = $conn->query($sql)->fetch_object();
        $sub[] = $query;
    }
    return $sub;
}

function developers($id)
{
    global $conn;
    $dev = [];
    $sql = "SELECT idDevelopers FROM dev_smezh WHERE idProduct = $id";
    $query = $conn->query($sql);
    $dev_smezh = $query->fetch_all(MYSQLI_ASSOC);
    for ($i = 0; $i < count($dev_smezh); $i++) {
        $sql = "SELECT developers FROM developer WHERE idDeveloper = " . $dev_smezh[$i]['idDevelopers'];
        $query = $conn->query($sql)->fetch_object();
        $dev[] = $query;
    }
    return $dev;
}

function signUp($email, $password)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        while ($row = $result->fetch_assoc()) {
            $res = $row;
        }
        return $res;
    } else {
        return null;
    }
}

function confirm($idUser, $dt, $basketIdProducts = [])
{
    global $conn;

    $result = $conn->query("SELECT * FROM basket");
    $row_cnt = $result->num_rows + 1;
    $stmt = $conn->prepare("INSERT INTO `basket` (`idBasket`, `idUserBasket`, `dataOrder`) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $row_cnt, $idUser, $dt);

    $stmt->execute();
    for ($i = 0; $i < count($basketIdProducts); $i++) {
        $stmt = $conn->prepare("INSERT INTO `orderbasket` (`idOrder`, `idOrderProduct`) VALUES (?, ?)");
        $stmt->bind_param("ii", $row_cnt, $basketIdProducts[$i]);
        $stmt->execute();
    }
}

function dbDate($dateForDateBase)
{
    $m_arr = array(
        1 => "Января",
        2 => "Февраля",
        3 => "Марта",
        4 => "Апреля",
        5 => "Мая",
        6 => "Июня",
        7 => "Июля",
        8 => "Августа",
        9 => "Сентября",
        10 => "Октября",
        11 => "Ноября",
        12 => "Декабря"
    );
    $date = date('d', $dateForDateBase) . " " . $m_arr[date("n", $dateForDateBase)] . " " . date("Y", $dateForDateBase);
    return $date;
}

function validateUser($login, $email)
{
    global $conn;
    $count_valid = 0;
    $stmt = $conn->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
        $count_valid++;
    } else {
        return 0;
    }
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
        $count_valid++;
    } else {
        return 0;
    }
    if ($count_valid == 2) {
        return true;
    }
}

function countBy($idUser, $categoryName)
{
    global $conn;

    $count_categoryName = 0;
    $query = [];

    $result = $conn->query("SELECT idBasket FROM basket WHERE idUserBasket = $idUser")->fetch_all(MYSQLI_ASSOC);
    for ($i = 0; $i < count($result); $i++) {
        $sql = "SELECT idOrderProduct FROM orderbasket WHERE idOrder = " . $result[$i]['idBasket'];
        $query[] = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    for ($i = 0; $i < count($query); $i++) {
        for ($j = 0; $j < count($query[$i]); $j++) {
            $sql = "SELECT idCategory FROM product WHERE idProduct = " . $query[$i][$j]['idOrderProduct'];
            $query1 = $conn->query($sql)->fetch_all(MYSQLI_ASSOC)[0];
            $sql = "SELECT categoryName FROM productcategory WHERE idMainCategory = " . $query1['idCategory'];
            $query2 = $conn->query($sql)->fetch_all(MYSQLI_ASSOC)[0];
            if ($query2['categoryName'] == $categoryName) {
                $count_categoryName++;
            }
        }
    }
    return $count_categoryName;
}
