<?php

// セッションがあるかを判定してからスタートする
if (!isset($_SESSION)) {
    session_start();
}

// アカウント重複確認をするためにdbに接続する
require_once('dbconnect.php');

// function関数のファイルを呼び出し
require_once('myfunc.php');

// 各記入蘭に空要素がないか確認するために空の変数を用意
$email_input = '';
$password_input = '';

// メールアドレスの記入確認
if (isset($_COOKIE['email'])) {
    $email_input = $_COOKIE['email'];
}
// if (isset($_POST['email'])) {
//     $email_input = h($_POST['email']);
// }

// パスワードの記入確認
if (isset($_POST['password'])) {
    $password_input = h($_POST['password']);
}

// 入力した値が挿入されていれば条件分岐がスタート
if (!empty($_POST)) {

    // パスワードなどを間違えても入力したアドレスが入力されたままにする。
    $email_input = $_POST['email'];

    // もしメアド、パスが挿入されていたらsql文を実行するプログラムに進む
    if ($_POST['email'] !== '' && $_POST['password'] !== '') {
        try {
            // メアド、パスを取得するsql
            $sql = "SELECT * FROM ";
            $sql .= "account ";
            $sql .= "WHERE ";
            $sql .= "email=? ";
            $sql .= "AND ";
            $sql .= "password=? ";

            // sql文の準備
            $stmt = $dbh->prepare($sql);

            // テーブルのメアド、パスのデータを指定
            $stmt->bindValue(1, $_POST['email'], PDO::PARAM_STR);
            $stmt->bindValue(2, sha1($_POST['password']), PDO::PARAM_STR);

            // sql文の発行
            $result = $stmt->execute();

            // sql文が発行できたら条件分岐を実行
            if ($result) {
                // 取得データを連想配列で$memberに代入。
                $member = $stmt->fetch(PDO::FETCH_ASSOC);

                // $memberにデータがあればログイン成功
                if ($member) {
                    // ログインに成功した情報をセッションに保存。$memberの配列にあるidをsession idに保存
                    $_SESSION['id'] = $member['id'];
                    $_SESSION['time'] = time();

                    // メアドをクッキーに保存する設定
                    if ($_POST['save'] === 'on') {
                        setcookie('email', $_POST['email'], time() + 60 * 60 * 24 * 14);
                    }

                    // ログインできていればindex.phpにジャンプ
                    header('Location: index.php');
                    die();
                } else {
                    // $memberにデータがなければログイン失敗
                    $error['login'] = 'failed';
                }
            }
        } catch (PDOException $e) {
            echo 'レコード確認エラー：' . $e->getMessage();
            die();
        }
    } else {
        // 入力されている情報がなければエラー文を走らせる文を実行
        $error['login'] = 'blank';
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>

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
            <!-- START:#section-login -->
            <section id="section-login" class="sec-log">
                <div class="sec-log-inner">
                    <div class="inner-title sec-log-inner-tit">
                        <h2>ログイン</h2>
                    </div>
                    <div class="sec-log-inner-contents contents">
                        <p>メールアドレスとパスワードを入力し、ログインボタンを押して下さい。</p>
                        <p>新規ユーザー登録がお済みでない方は、下記よりご登録をお願いいたします。</p>
                    </div>

                    <!-- START:login-form -->
                    <div class="form sec-log-inner-form">
                        <form action="" method="post">

                            <!-- メールアドレス -->
                            <div class="form-item sec-log-inner-form-item">
                                <label for="email" class="form-item-label sec-log-inner-form-item-label">メールアドレス</label>
                                <div class="form-item-input sec-log-inner-form-item-input">
                                    <input id="email" type="mail" name="email" placeholder="abcd123@efg.com" value="<?php echo $email_input; ?>" required />
                                </div>
                            </div>

                            <!-- パスワード -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="password" class="form-item-label sec-log-inner-form-item-label">パスワード<span class="required">必須</span></label>
                                <div class="form-item-input sec-log-inner-form-item-input">
                                    <input id="password" type="password" name="password" minlength="4" value="<?php echo $password_input; ?>" required />
                                </div>
                            </div>

                            <!-- ログインの記録 -->
                            <div class="form-item sec-log-inner-form-item-save">
                                <div class="sec-log-inner-form-item-input">
                                    <!-- クッキーに保存する際にpostの値がsaveでvalueがonを設定。 -->
                                    <input id="save" type="checkbox" name="save" value="on" />
                                </div>
                                <label for="save" class="form-item-label gap ta-center sec-log-inner-form-item-label">次回からは自動的にログインする</label>
                            </div>
                            <div class="button-a sec-log-inner-form-check">
                                <input type="submit" value="ログインする" />
                            </div>
                            <?php
                            if (isset($error['login']) && $error['login'] === 'blank') {
                                echo '<p class="error ta-center">*メールアドレスとパスワードを入力してください</p>';
                            }
                            if (isset($error['login']) && $error['login'] === 'failed') {
                                echo '<p class="error ta-center">*ログインに失敗しました。正しくご記入ください。</p>';
                            }
                            ?>
                            <!-- <p class="error ta-center">*メールアドレスとパスワードを入力して下さい。</p>
                            <p class="error ta-center">ログインに失敗しました。正しくご記入ください。</p> -->
                        </form>

                    </div>
                    <!-- END:login-form -->
                    <div class="button-a">
                        <a href="join/">新規ユーザー登録をする</a>
                    </div>
                </div>
            </section>
            <!-- END:#section-login -->

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
