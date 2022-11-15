<?php
$thread_array = array();

//スレッドデータをテーブルから取得
$sql = "SELECT * FROM thread";
$statement = $pdo->prepare($sql);
$statement->execute();

$thread_array = $statement;
//var_dump($thread_array->fetchAll());
