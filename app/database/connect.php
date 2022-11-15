<?php

$user = "bbs-admin";
$pass = "2chan-bbs-admin";

//DB接続
try {
    $pdo = new PDO('mysql:host=localhost;dbname=2chan-bbs', $user, $pass);
    //echo "DBとの接続成功";
} catch (PDOException $error) {
    echo $error->getMessage();
}
