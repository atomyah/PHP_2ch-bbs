<?php

//DB接続詞インポート
include_once("../database/connect.php");

include("../../app/functions/thread_add.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規スレッド作成ページ</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body>
    <!-- ヘッダーブロック -->
    <?php include("../parts/header.php"); ?>

    <!-- バリデーションチェックのエラー表示ブロック -->
    <?php include("../parts/validation.php"); ?>
    
    <div style="padding:36px; color:blue;">
        <h2 style="margin-top:20px; margin-bottom:0;">新規スレッド立ち上げ場</h2>
    </div>
    <form method="POST" class="formWrapper">
        <div>
            <label>スレッド名</label>
            <input type="text" name="title">
            <label>投稿者</label>
            <input type="text" name="username">
        </div>
        <div>
            <textarea name="body" class="commentTextArea"></textarea>
        </div>
        <input type="submit" value="スレッド立ち上げ" name="threadSubmitButton">
    </form>
</body>
</html>