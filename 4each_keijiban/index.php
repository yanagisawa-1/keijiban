<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

mb_internal_encoding("utf8");
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","mysql");
$stmt = $pdo -> query("select * from 4each_keijiban");

?>

    <img src="4eachblog_logo.jpg">

<header>

    <ul>
        <li>トップ</li>
        <li>プロフィール</li>
        <li>4eachについて</li>
        <li>登録フォーム</li>
        <li>問い合わせ</li>
        <li>その他</li>
    </ul>

</header>

<main>

    <div class="left">

        <h1>プログラミングに役立つ掲示板</h1>

        <form method="post" action="insert.php">

            <h2>入力フォーム</h2>

            <div class="formcontent">
                <h3>ハンドルネーム</h3>
                <input type="text" size="20" name="handlename">
            </div>

            <div class="formcontent">
                <h3>タイトル</h3>
                <input type="text" size="20" name="title">
            </div>

            <div class="formcontent">
                <h3>コメント</h3>
                <textarea rows="5" cols="40" name="comments"></textarea>
            </div>

            <input type="submit" class="submit" value="投稿する">

        </form>

        <?php

        while($row = $stmt->fetch()) {
            echo "<div class='kiji'>";
            echo "<h5>".$row['title']."</h5>";
            echo "<div class='contents'>";
            echo $row['comments'];
            echo "<div class='handlename'>posted by".$row['handlename']."</div>";
            echo "</div>";
            echo "</div>";
        }

        ?>

    </div>

    <div class="right">

        <div class="side">
            <h4>人気の記事</h4>
            <p>PHPオススメ本<br>
            PHP MyAdminの使い方<br>
            いま人気のエディタTop5</p>
        </div>

        <div class="side">
            <h4>オススメリンク</h4>
            <p>インターノウス株式会社<br>
                XAMPPのダウンロード<br>
                Eclipseのダウンロード<br>
                Braketsのダウンロード</p>
        </div>

        <div class="side">
            <h4>カテゴリ</h4>
            <p>HTML<br>
                PHP<br>
                MySQL<br>
                JavaScript</p>
        </div>

    </div>

</main>

<footer>
    copyright internous | 4each blog is the one which provides A to Z about programming.
</footer>

</body>

</html>