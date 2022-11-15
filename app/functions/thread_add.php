<?php

$error_message = array();

if(isset($_POST["threadSubmitButton"])) {

    //スレッドタイトル入力バリデーション
    if(empty($_POST["title"])) {
        $error_message["title"] = "スレッドタイトルを入力してください。";
    } else {
        //エスケープ処理
        $escaped["title"] = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");

    }

    //お名前入力バリデーション
    if(empty($_POST["username"])) {
        $error_message["username"] = "お名前を入力してください。";
    } else {
        //エスケープ処理
        $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");

    }
    //コメント入力バリデーション
    if(empty($_POST["body"])) {
        $error_message["body"] = "コメントを入力してください。";
    } else {
         //エスケープ処理
        $escaped["body"] = htmlspecialchars($_POST["body"], ENT_QUOTES, "UTF-8");
    }

    //投稿の実行処理。
    //バリデーションエラー（$error_message）がなければ投稿を実行
    if(empty($error_message)) { 
        $post_date = date("Y-m-d H:i:s");

        //トランザクション開始
        $pdo->beginTransaction();
        
        try {
            // スレッド追加
            $sql = "INSERT INTO `thread` (`title`) VALUES (:title);";
            $statement = $pdo->prepare($sql);

            //値をセット
            $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR);

            $statement->execute();


            //コメントも追加
            $sql = "INSERT INTO comment (username, body, post_date, thread_id) 
            VALUES (:username, :body, :post_date, (SELECT id FROM thread WHERE title = :title))"; 
                                                //このSELECT文でこの投稿しているスレッドのthread_idの値を
                                                //このスレッドの"タイトル名が一致するもの"とするWHEREで取ってきている。
            $statement = $pdo->prepare($sql);

            //値をセットする。
            $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR);
            $statement->bindParam(":body", $escaped["body"], PDO::PARAM_STR);
            $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
            $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR);

            $statement->execute();

            $pdo->commit();
            
        } catch(Exception $error) {
            $pdo->rollBack();
        }


    }

    // ホームにリダイレクト
    header("location: http://localhost:8080/2chan-bbs");
}