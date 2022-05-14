<?php
// セッションがあるかを判定してからスタートする
if (!isset($_SESSION)) {
    session_start();
}

// アカウント重複確認をするためにdbに接続する
require_once('../dbconnect.php');

// function関数のファイルを呼び出し
require_once('../myfunc.php');

// 店名の挿入を確認
$name_input = '';
if (isset($_POST['name'])) {
    $name_input = h($_POST['name']);
    //check.phpから戻ってきたときにSESSION['join']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['join']['name'])) {
    $name_input = h($_SESSION['join']['name']);
}

// メールアドレスの挿入を確認
$email_input = '';
if (isset($_POST['email'])) {
    $email_input = h($_POST['email']);
    //check.phpから戻ってきたときにSESSION['join']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['join']['email'])) {
    $email_input = h($_SESSION['join']['email']);
}

// パスワードの挿入を確認
$password_input = '';
if (isset($_POST['password'])) {
    $password_input = h($_POST['password']);
    //check.phpから戻ってきたときにSESSION['join']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['join']['password'])) {
    $password_input = h($_SESSION['join']['password']);
}

// もしフォームの各項目が空欄でなければ条件を処理する
if (!empty($_POST)) {

    // ニックネームが空欄であればerrorの配列name内にblankを代入する
    if ($_POST['name'] === '') {
        $error['name'] = 'blank';
    }

    // メールが空欄であればerrorの配列name内にblankを代入する
    if ($_POST['email'] === '') {
        $error['email'] = 'blank';
    }

    // パスワードの文字が4文字未満であればエラーを表示
    if (strlen($_POST['password']) < 4) {
        $error['password'] = 'length';
    }

    // パスワードが空欄であればerrorの配列name内にblankを代入する
    if ($_POST['password'] === '') {
        $error['password'] = 'blank';
    }

    // ファイルの拡張子を確認するエラーチェック
    $fileName = $_FILES['image']['name'];
    if (!empty($fileName)) {
        // ファイル名の後ろ３文字を切り取る。substr
        $ext = substr($fileName, -3);
        if ($ext != 'jpg' && $ext != 'JPG' && $ext != 'PNG' && $ext != 'png') {
            $error['image'] = 'type';
        }
    }

    // アカウントの重複項目がないかをチェックする
    if (empty($error)) {
        try {
            // 挿入するsql文準備
            $sql = "SELECT COUNT(*) ";
            $sql .= "AS cnt ";
            $sql .= "FROM ";
            $sql .= "account ";
            $sql .= "WHERE ";
            $sql .= "email=?";

            // sql文の準備
            $stmt = $dbh->prepare($sql);

            // 入力したメアドのデータをテーブルに存在するか確認する
            $stmt->bindValue(1, $_POST['email'], PDO::PARAM_STR);

            // sql文の発行
            $result = $stmt->execute();

            // sql文の発行ができたならば
            if ($result) {
                // $emailに取得したデータを連想配列として返して代入
                $email = $stmt->fetch(PDO::FETCH_ASSOC);
                // sql文のテーブルのレコード数をcntに格納した件数が0未満であればエラーを作成。つまり同じメアドがあるかどうかを0,1で返してくる。存在する場合は「1」存在しない場合は「０」となる。
                if ($email['cnt'] > 0) {
                    $error['email'] = 'duplicate';
                }
            }

            // 重複を確認してエラーを表示する設定
            // if ($result['cnt'] > 0) {
            // 	$error['email'] = 'duplicate';
            // }
        } catch (PDOException $e) {
            echo 'レコード取得エラー：' . $e->getMessage();
            die();
        }

        // 接続を閉じる
        $dbh = null;
        $stmt = null;
    }

    // もしエラーがなければページを遷移する
    if (empty($error)) {
        // ファイルをアップロードした時間を取得し、ファイル名と連結する
        $image = date('YmdHis') . $_FILES['image']['name'];
        // 第一引数でファイルを一時的に保存する。第二引数でそれらを指定したフォルダに移動する。
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            '../account_picture/' . $image
        );
        // エラーがなければjoinにPOSTの内容を保存する。これでcheck.phpで値を参照できる
        $_SESSION['join'] = $_POST;
        $_SESSION['join']['image'] = $image;
        header('Location: check.php');
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>

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
            <section id="section-regist" class="sec-reg">
                <div class="sec-reg-inner">
                    <div class="inner-title sec-reg-inner-tit">
                        <h2>会員登録</h2>
                    </div>
                    <div class="sec-reg-inner-contents contents">
                        <p>下記のフォームに必要事項をご記載ください。</p>
                    </div>
                    <div class="form sec-reg-inner-form">
                        <form action="" method="post" enctype="multipart/form-data">

                            <!-- 店名 -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="shopname" class="form-item-label sec-reg-inner-form-item-label">店名<span class="required">必須</span></label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="shopname" type="text" name="name" placeholder="例）HERO's Bike Store" value="<?php echo $name_input; ?>" required />
                                    <?php
                                    if (isset($error['name']) && $error['name'] === 'blank') {
                                        echo '<p class="error">*ニックネームを入力してください</p>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- メール -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="email" class="form-item-label sec-reg-inner-form-item-label">メールアドレス<span class="required">必須</span></label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="email" type="mail" name="email" placeholder="abcd123@efg.com" value="<?php echo $email_input; ?>" required />
                                    <?php
                                    if (isset($error['email']) && $error['email'] === 'blank') {
                                        echo '<p class="error">*メールアドレスを入力してください</p>';
                                    }
                                    ?>
                                    <?php
                                    if (isset($error['email']) && $error['email'] === 'duplicate') {
                                        echo '<p class="error">*入力したメールアドレスは、既に登録されています。</p>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- パスワード -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="password" class="form-item-label sec-reg-inner-form-item-label">パスワード<span class="required">必須</span></label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="password" type="password" name="password" minlength="4" placeholder="英数字の小文字、大文字を含めてご入力ください" value="<?php echo $password_input; ?>" required />
                                    <?php
                                    if (isset($error['password']) && $error['password'] === 'blank') {
                                        echo '<p class="error">*パスワードを入力してください。英数字の小文字、大文字を含めてご入力ください。</p>';
                                    }
                                    if (isset($error['password']) && $error['password'] === 'length') {
                                        echo '<p class="error">*パスワードは4文字以上で入力してください</p>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- サムネイル -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="image" class="form-item-label sec-reg-inner-form-item-label">サムネイルの選択<br>※拡張子は.jpgもしくは.png</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <!-- ブラウザによって「ファイル選択」の表記が変わってくる -->
                                    <input id="image" type="file" name="image" value="test" />
                                    <?php
                                    if (isset($error['image']) && $error['image'] === 'type') {
                                        echo '<p class="error">*写真の拡張子は、.jpgもしくは.pngとなります。</p>';
                                    }
                                    // フォーム内にerrorがあれば下のエラーを表示する
                                    if (!empty($error)) {
                                        echo '<p class="error">*恐れ入りますが、画像を改めて指定してください。</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="button-a sec-reg-inner-form-check">
                                <input type="submit" value="入力内容を確認する" />
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
