<?php
// セッションがあるかを判定してからスタートする
if (!isset($_SESSION)) {
    session_start();
}

// db接続するテンプレを呼び出し
require_once('../dbconnect.php');

// function関数のファイルを呼び出し
require_once('../myfunc.php');

// SESSIONにjoinが入っていなければindex.phpに戻される
if (!isset($_SESSION['join'])) {
    header('Location: index.php');
    die();
}

// dbテーブル内のdatetime取得のため変数を用意
$date = new DateTime();
$date = $date->format('Y-m-d H:i:s');

// 登録ボタンを押したらデータをdbに挿入する
if (!empty($_POST)) {
    try {
        // 挿入するsql文準備
        $sql = "INSERT INTO ";
        $sql .= "account ";
        $sql .= "(name, email, password, picture, created) ";
        $sql .= "VALUES ";
        $sql .= "(?, ?, ?, ?, ?) ";

        // sql文の準備
        $stmt = $dbh->prepare($sql);

        // 値の代入?を使う場合
        $stmt->bindValue(1, $_SESSION['join']['name'], PDO::PARAM_STR);
        $stmt->bindValue(2, $_SESSION['join']['email'], PDO::PARAM_STR);
        $stmt->bindValue(3, sha1($_SESSION['join']['password']), PDO::PARAM_STR);
        $stmt->bindValue(4, $_SESSION['join']['image'], PDO::PARAM_STR);
        $stmt->bindValue(5, $date, PDO::PARAM_STR);

        // sql文の発行
        $result = $stmt->execute();

        // db挿入したらsession変数を空にする命令
        unset($_SESSION['join']);

        // db挿入ができたらthanks.phpにジャンプ
        header('Location: thanks.php');
        die();
    } catch (PDOException $e) {
        echo 'レコード挿入エラー：' . $e->getMessage();
        die();
    }

    // 接続を閉じる
    $dbh = null;
    $stmt = null;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録内容の確認</title>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- style sheets -->
    <link rel="stylesheet" href="../css/style-main.min.css">
</head>

<body>
    <div id="wrap">

        <!-- START header -->
        <header>
            <div class="header-inner">
                <h1>HERO's Bike Bicycle Records</h1>
            </div>
        </header>
        <!-- END header -->

        <!-- START main -->
        <main>
            <section id="section-check" class="sec-che">
                <div class="sec-che-inner">
                    <div class="inner-title sec-che-inner-tit">
                        <h2>登録内容の確認</h2>
                    </div>
                    <div class="sec-che-inner-contents contents">
                        <p>記入した内容を確認して、「登録する」ボタンをクリックしてください。</p>
                    </div>
                    <div class="form sec-che-inner-form">
                        <form action="" method="post">
                            <input type="hidden" name="action" value="submit">

                            <!-- 店名 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">店名</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['join']['name']); ?></p>
                                </div>
                            </div>

                            <!-- メール -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">メールアドレス</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['join']['email']); ?></p>
                                </div>
                            </div>

                            <!-- パスワード -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">パスワード</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>パスワードは表示されません</p>
                                </div>
                            </div>

                            <!-- サムネイル -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">サムネイル</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <div><?php
                                            if ($_SESSION['join']['image'] != '') {
                                                echo '<img src="../account_picture/' . h($_SESSION['join']['image']) . '">';
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>

                            <div class="sec-che-inner-form-rewrite flex-box">
                                <a href="index.php?action=rewrite" class="button-a">書き直す</a>
                                <input class="button-a" type="submit" value="登録する" />
                            </div>
                        </form>
                    </div>
                </div>
            </section>

        </main>
        <!-- END main -->

        <!-- START footer -->
        <footer>
            <div class="footer-inner">
                <p><small>&copy; <span id="copyRight"></span> 小野商店</small></p>
            </div>
        </footer>
        <!-- END footer -->
    </div>

    <script src="../js/copyright.js"></script>
</body>

</html>
