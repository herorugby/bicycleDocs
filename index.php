<?php

// セッションがあるかを判定してからスタートする
if (!isset($_SESSION)) {
    session_start();
}

// アカウント重複確認をするためにdbに接続する
require_once('dbconnect.php');

// function関数のファイルを呼び出し
require_once('myfunc.php');

// DataBaseに登録されているデータの取得
// ログイン時にセッションを保存し、idがある場合とセッションに保存した時間足す１時間の合計時間が現在時間より大きければログイン状態となる。現在時間が大きくなるとログアウト
if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
    // 何かアクションを起こした時にセッションの時間を現在の時間に更新する
    $_SESSION['time'] = time();

    try {
        // アカウントのidを取得する
        $sql_select_id = "SELECT * FROM ";
        $sql_select_id .= "members ";
        $sql_select_id .= "WHERE ";
        $sql_select_id .= "id=?";

        // sql文の準備
        $stmt_id = $dbh->prepare($sql_select_id);

        // テーブルのメアド、パスのデータを指定
        $stmt_id->bindValue(1, $_SESSION['id'], PDO::PARAM_INT);

        // sql文の発行
        $result_id = $stmt_id->execute();

        // sql文が発行できたら条件分岐を実行
        if ($result_id) {
            // 取得データを連想配列で$memberに代入。
            $member = $stmt_id->fetch(PDO::FETCH_ASSOC);
            // 取得したデータの名前をエスケープで変数に格納
            $nickname = h($member['name']);
            $picture = h($member['picture']);
        }
    } catch (PDOException $e) {
        echo 'レコード確認エラー：' . $e->getMessage();
        die();
    }
    // ログイン時のセッション等なければ
} else {
    header('Location: login.php');
    die();
}

// お客様データの取得



?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HERO's Bike Bicycle Records</title>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- style sheets -->
    <link rel="stylesheet" href="css/style-main.min.css">
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
            <section id="section-welcome" class="sec-wel">
                <div class="sec-wel-inner">
                    <div class="inner-title sec-wel-inner-tit">
                        <h2>WELCOME!!!<?php echo $nickname; ?>様</h2>
                    </div>
                    <div class="sec-wel-inner-sam">
                        <!-- <img src="member_picture/<?php echo h($post['picture']); ?>" width="48" height="48" alt="" /> -->
                    </div>
                </div>
            </section>

            <section id="section-search" class="sec-sea">
                <div class="sec-sea-inner">
                    <div class="sec-sea-inner-contents contents">
                        <h3>お客様のフリガナを入力し、検索をして下さい。</h3>
                    </div>
                    <div class="form sec-sea-inner-form">
                        <form action="" method="post">
                            <div class="form-item sec-sea-inner-form-item">
                                <label for="namae" class="form-item-label sec-sea-inner-form-item-label">フリガナ</label>
                                <div class="form-item-input sec-sea-inner-form-item-input">
                                    <input id="namae" type="text" name="namae" value="" placeholder="ヤマダ　ハナコ" required />
                                    <!-- <p class="error">*お客様のお名前を入力して下さい。</p> -->
                                </div>
                            </div>
                            <div class="sec-sea-inner-form-list">
                                <p class="error">
                                    お客様情報が見つかりませんでした。お客様情報一覧から検索も可能です。
                                </p>
                                <a href="list.html" class="tolist">お客様情報一覧へ</a>
                            </div>
                            <div class="button-a sec-sea-inner-form-check">
                                <input type="submit" value="検索する" />
                            </div>
                        </form>

                    </div>
                </div>
            </section>

            <div id="section-buttons" class="flex-box sec-buts">
                <div class="sec-buts-cusreg">
                    <div class="button-a">
                        <a href="register/">お客様情報の新規登録</a>
                    </div>
                </div>

                <div class="sec-buts-out">
                    <div class="button-a">
                        <a href="logout.html">ログアウト</a>
                    </div>
                </div>
            </div>

            <div id="section-customer-edit" class="sec-cus-edit">
                <a href="">会員登録内容を変更する場合はこちら</a>
            </div>
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

    <script src="js/copyright.js"></script>
</body>

</html>
