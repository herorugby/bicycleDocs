<?php
// セッションがあるかを判定してからスタートする
if (!isset($_SESSION)) {
    session_start();
}

// db接続するテンプレを呼び出し
require_once('../dbconnect.php');

// function関数のファイルを呼び出し
require_once('../myfunc.php');

if (!isset($_SESSION['regist'])) {
    header('Location: index.php');
    die();
}

// dbテーブル内のdatetime取得のため変数を用意
$date = new DateTime();
$date = $date->format('Y-m-d H:i:s');

/*
------------------------------------
登録ボタンを押したらデータをdbに挿入する
------------------------------------
*/
if (!empty($_POST)) {
    try {

        /*
        ------------------------------------
        基本情報のデータ登録
        ------------------------------------
        */
        // 挿入するsql文準備
        $sql_insert_customer_info = "INSERT INTO ";
        $sql_insert_customer_info .= "customers ";
        $sql_insert_customer_info .= "(name, kana, tel, sell_phone, mail, zipcode, address, regist_date, bicycle, body_number, crime_no, body_picture, created) ";
        $sql_insert_customer_info .= "VALUES ";
        $sql_insert_customer_info .= "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

        // sql文の準備
        $stmt_insert_customer_info = $dbh->prepare($sql_insert_customer_info);

        // 値の代入?を使う場合
        $stmt_insert_customer_info->bindValue(1, $_SESSION['regist']['name'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(2, $_SESSION['regist']['kana'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(3, $_SESSION['regist']['tel'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(4, $_SESSION['regist']['sell_phone'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(5, $_SESSION['regist']['email'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(6, $_SESSION['regist']['zipcode'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(7, $_SESSION['regist']['address'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(8, $_SESSION['regist']['regist_date'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(9, $_SESSION['regist']['body'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(10, $_SESSION['regist']['frameno'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(11, $_SESSION['regist']['crime_no'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(12, $_SESSION['regist']['body_picture'], PDO::PARAM_STR);
        $stmt_insert_customer_info->bindValue(13, $date, PDO::PARAM_STR);


        /*
        ------------------------------------
        新車情報のデータ登録
        ------------------------------------
        */
        // 挿入するsql文準備
        $sql_insert_newbicycle_info = "INSERT INTO ";
        $sql_insert_newbicycle_info .= "new-bicycle ";
        $sql_insert_newbicycle_info .= "(maker, products, size_color, quantity, amount_exclude, amount_include, total_amount_exc, total_amount_inc, memo, created) ";
        $sql_insert_newbicycle_info .= "VALUES ";
        $sql_insert_newbicycle_info .= "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

        // sql文の準備
        $stmt_insert_newbicycle_info = $dbh->prepare($sql_insert_newbicycle_info);

        // 値の代入?を使う場合
        $stmt_insert_newbicycle_info->bindValue(1, $_SESSION['regist']['maker'], PDO::PARAM_STR);
        $stmt_insert_newbicycle_info->bindValue(2, $_SESSION['regist']['products'], PDO::PARAM_STR);
        $stmt_insert_newbicycle_info->bindValue(3, $_SESSION['regist']['size_color'], PDO::PARAM_STR);
        $stmt_insert_newbicycle_info->bindValue(4, $_SESSION['regist']['quantity'], PDO::PARAM_STR);
        $stmt_insert_newbicycle_info->bindValue(5, $_SESSION['regist']['amount_exclude'], PDO::PARAM_STR);
        $stmt_insert_newbicycle_info->bindValue(6, $_SESSION['regist']['amount_include'], PDO::PARAM_STR);
        $stmt_insert_newbicycle_info->bindValue(7, $_SESSION['regist']['total_amount_exc'], PDO::PARAM_STR);
        $stmt_insert_newbicycle_info->bindValue(8, $_SESSION['regist']['total_amount_inc'], PDO::PARAM_STR);
        $stmt_insert_newbicycle_info->bindValue(9, $_SESSION['regist']['newmemo'], PDO::PARAM_STR);
        $stmt_insert_newbicycle_info->bindValue(10, $date, PDO::PARAM_STR);

        // sql文の発行
        $result_insert_newbicycle_info = $stmt_insert_newbicycle_info->execute();

        /*
        ------------------------------------
        修理車情報のデータ登録
        ------------------------------------
        */
        // 挿入するsql文準備
        $sql_insert_fixbicycle_info = "INSERT INTO ";
        $sql_insert_fixbicycle_info .= "fix-bicycle ";
        $sql_insert_fixbicycle_info .= "(fix_date, memo, created) ";
        $sql_insert_fixbicycle_info .= "VALUES ";
        $sql_insert_fixbicycle_info .= "(?, ?, ?) ";

        // sql文の準備
        $stmt_insert_fixbicycle_info = $dbh->prepare($sql_insert_fixbicycle_info);

        $stmt_insert_fixbicycle_info->bindValue(1, $_SESSION['regist']['fix_date'], PDO::PARAM_STR);
        $stmt_insert_fixbicycle_info->bindValue(2, $_SESSION['regist']['fixmemo'], PDO::PARAM_STR);
        $stmt_insert_fixbicycle_info->bindValue(3, $date, PDO::PARAM_STR);

        // db挿入したらsession変数を空にする命令
        unset($_SESSION['regist']);

        // db挿入ができたらthanks.phpにジャンプ
        header('Location: thanks.php');
        die();
    } catch (PDOException $e) {
        echo 'レコード挿入エラー：' . $e->getMessage();
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
    <title>お客様登録内容確認</title>

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

                            <!--
                                基本情報
                            -->

                            <!-- お名前 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">お名前</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['name']); ?></p>
                                </div>
                            </div>

                            <!-- フリガナ -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">フリガナ</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['kana']); ?></p>
                                </div>
                            </div>

                            <!-- Tel -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">Tel</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['tel']); ?></p>
                                </div>
                            </div>

                            <!-- 携帯 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">携帯番号</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['sell_phone']); ?></p>
                                </div>
                            </div>

                            <!-- メールアドレス -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">メールアドレス</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['email']); ?></p>
                                </div>
                            </div>

                            <!-- 郵便番号 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">郵便番号</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['zipcode']); ?></p>
                                </div>
                            </div>

                            <!-- ご住所 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">ご住所</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['address']); ?></p>
                                </div>
                            </div>

                            <!-- 来店日 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">初回ご来店日</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['regist_date']); ?></p>
                                </div>
                            </div>

                            <!-- 車種 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">登録車種</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['body']); ?></p>
                                </div>
                            </div>

                            <!-- 車体番号 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">車体番号</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['frameno']); ?></p>
                                </div>
                            </div>

                            <!-- 防犯登録番号 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">防犯登録番号</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p><?php echo h($_SESSION['regist']['crime_no']); ?></p>
                                </div>
                            </div>

                            <!-- 車体写真 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">車体写真</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <?php
                                    if ($_SESSION['regist']['body_picture'] != '') {
                                        echo '<img src="../bicycle_pictures/' . h($_SESSION['regist']['body_picture']) . '" alt="車体写真">';
                                    }
                                    ?>
                                </div>
                            </div>

                            <!--
                                新車情報
                            -->
                            <table class="form-table new-bicycle sec-che-inner-form-table">

                                <caption class="bold">--新車購入情報内容--</caption>

                                <thead>
                                    <tr>
                                        <th>メーカー</th>
                                        <th>商品名</th>
                                        <th>サイズ・カラー</th>
                                        <th class="minth">数量</th>
                                        <th class="smallth">金額(税抜)</th>
                                        <th class="smallth">金額(税込)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td><?php echo h($_SESSION['regist']['maker']); ?></td>
                                        <td><?php echo h($_SESSION['regist']['products']); ?></td>
                                        <td><?php echo h($_SESSION['regist']['size_color']); ?></td>
                                        <td><?php echo h($_SESSION['regist']['quantity']); ?></td>
                                        <td><?php echo h($_SESSION['regist']['amount_exclude']); ?></td>
                                        <td><?php echo h($_SESSION['regist']['amount_include']); ?></td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr class="sec-che-inner-form-table-tot">
                                        <td class="sec-che-inner-form-table-tot-txt bold" colspan="4">TOTAL</td>
                                        <td class="sec-che-inner-form-table-tot-totaltaxex">¥<?php echo h($_SESSION['regist']['total_amount_exc']); ?></td>
                                        <td class="sec-che-inner-form-table-tot-totaltaxin">¥<?php echo h($_SESSION['regist']['total_amount_inc']); ?></td>
                                    </tr>
                                    <tr class="sec-che-inner-form-table-txt">
                                        <td colspan="6">
                                            <?php echo h($_SESSION['regist']['newmemo']); ?>
                                        </td>
                                    </tr>
                                </tfoot>

                            </table>

                            <!--
                                修理情報
                            -->
                            <table class="form-table fix-bicycle sec-che-inner-form-table">

                                <caption class="bold">--修理情報--</caption>

                                <thead>
                                    <tr>
                                        <th class="midth">日付</th>
                                        <th>修理内容・メモ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="sec-che-inner-form-table-fixinfo">
                                        <td><?php echo h($_SESSION['regist']['fix_date']); ?></td>
                                        <td><?php echo h($_SESSION['regist']['fixmemo']); ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="sec-che-inner-form-rewrite flex-box">
                                <a class="button-a" href="index.php?action=rewrite">書き直す</a>
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
