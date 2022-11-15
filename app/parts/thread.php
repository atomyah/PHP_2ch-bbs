<?php

//DB接続詞インポート
include_once("app/database/connect.php");
//コメント投稿機能インポート
include("app/functions/comment_add.php");
//スレッド読み込み機能インポート
include("app/functions/thread_get.php");

?>

<?php foreach($thread_array as $thread) : ?>
<div class="threadWrapper">
        <div class="childWrapper">
            <div class="threadTitle">
                <span>【タイトル】</span>
                <h1><?php echo $thread['title'] ?></h1>   
            </div>
            <!-- コメント表示ブロック -->
            <?php include("commentSection.php"); ?>
            <!-- コメントフォームブロック -->
            <?php include("commentForm.php"); ?>
        </div> 
</div>
<?php endforeach ?>

