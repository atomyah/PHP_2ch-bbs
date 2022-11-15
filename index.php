<?php

//DB接続詞インポート
include_once("./app/database/connect.php");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>２ちゃんねる掲示板</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <!-- ヘッダーブロック -->
    <?php include("app/parts/header.php"); ?>

    <!-- バリデーションチェックのエラー表示ブロック -->
    <?php include("app/parts/validation.php"); ?>

    <!-- スレッドブロック -->
    <?php include("app/parts/thread.php"); ?>

    <!-- 新規スレッド作成ボタンブロック -->
    <?php include("app/parts/newThreadButton.php"); ?>

</body>
</html>