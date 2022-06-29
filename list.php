<?php
// セッションがあるかを判定してからスタートする
if (!isset($_SESSION)) {
    session_start();
}

// アカウント重複確認をするためにdbに接続する
require_once('dbconnect.php');

// function関数のファイルを呼び出し
require_once('myfunc.php');

// お客様データの取得
try {
    // フリガナのデータを取得するsql
    $sql_all_list = "SELECT * FROM ";
    $sql_all_list .= "customers ";
    // $sql_all_list .= "WHERE ";
    // $sql_all_list .= "kana ";
    // $sql_all_list .= "REGEXP ";
    // $sql_all_list .= "^ア|^ｱ ";

    // sql文の準備
    $stmt_all_lists = $dbh->prepare($sql_all_list);

    // sql文の発行
    $result_all_lists = $stmt_all_lists->execute();

    // // foreach文で配列の中身を一行ずつ出力
    // foreach ($stmt_all_lists as $row) {

    //     // データベースのフィールド名で出力
    //     echo $row['kana'];

    //     // 改行を入れる
    //     echo '<br>';
    // }

    // sql文が発行できたら条件分岐を実行
    if ($result_all_lists) {
        // 取得データを連想配列で$customer_all_listsに代入。
        $customer_all_lists = $stmt_all_lists->fetch(PDO::FETCH_ASSOC);
    } else {
        // $customer_all_listsにデータがなければデータ取得失敗
        $error['list'] = 'failed';
    }
} catch (PDOException $e) {
    echo 'レコード確認エラー：' . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お客様リスト一覧</title>

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
            <section id="section-choice" class="sec-cho">
                <div class="sec-cho-inner">
                    <div class="inner-title sec-cho-inner-tit">
                        <h2>お客様情報一覧</h2>
                    </div>
                    <div class="sec-cho-inner-choo">
                        <div class="sec-cho-inner-choo-contents contents">
                            <p>該当のフリガナを選択して下さい。</p>
                        </div>

                        <!-- お客様データを出力。配列用のforeach -->
                        <?php
                        if ($customer_all_lists) :
                            foreach ($stmt_all_lists as $list_value) :
                        ?>
                                <div class="accordion sec-cho-inner-choo-ac">
                                    <p class="accordion-list sec-cho-inner-choo-ac-list">ア行</p>
                                    <?php
                                    if ($a_lists = preg_grep('{^ア|^イ|^ウ|^エ|^オ}', $list_value)) :
                                    ?>
                                        <ul>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item"><?php echo h($a_lists); ?></li>
                                            <!-- <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li> -->
                                        </ul>
                                    <?php
                                    endif;
                                    ?>
                                </div>

                                <div class="accordion sec-cho-inner-choo-ac">
                                    <p class="accordion-list sec-cho-inner-choo-ac-list">カ行</p>
                                    <?php
                                    if ($ka_lists = preg_grep('{^カ|^キ|^ク|^ケ|^コ}', $list_value)) :
                                    ?>
                                        <ul>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item"><?php echo h($ka_lists); ?></li>
                                            <!-- <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li> -->
                                        </ul>
                                    <?php
                                    endif;
                                    ?>
                                </div>

                                <div class="accordion sec-cho-inner-choo-ac">
                                    <p class="accordion-list sec-cho-inner-choo-ac-list">サ行</p>
                                    <?php
                                    if ($sa_lists = preg_grep('{^サ|^シ|^ス|^セ|^ソ}', $list_value)) :
                                    ?>
                                        <ul>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item"><?php echo h($sa_lists); ?></li>
                                            <!-- <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li> -->
                                        </ul>
                                    <?php
                                    endif;
                                    ?>
                                </div>

                                <div class="accordion sec-cho-inner-choo-ac">
                                    <p class="accordion-list sec-cho-inner-choo-ac-list">タ行</p>
                                    <?php
                                    if ($ta_lists = preg_grep('{^タ|^チ|^ツ|^テ|^ト}', $list_value)) :
                                    ?>
                                        <ul>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item"><?php echo h($ta_lists); ?></li>
                                            <!-- <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li> -->
                                        </ul>
                                    <?php
                                    endif;
                                    ?>
                                </div>

                                <div class="accordion sec-cho-inner-choo-ac">
                                    <p class="accordion-list sec-cho-inner-choo-ac-list">ナ行</p>
                                    <?php
                                    if ($na_lists = preg_grep('{^ナ|^ニ|^ヌ|^ネ|^ノ}', $list_value)) :
                                    ?>
                                        <ul>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item"><?php echo h($na_lists); ?></li>
                                            <!-- <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li> -->
                                        </ul>
                                    <?php
                                    endif;
                                    ?>
                                </div>

                                <div class="accordion sec-cho-inner-choo-ac">
                                    <p class="accordion-list sec-cho-inner-choo-ac-list">ハ行</p>
                                    <?php
                                    if ($ha_lists = preg_grep('{^ハ|^ヒ|^フ|^ヘ|^ホ}', $list_value)) :
                                    ?>
                                        <ul>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item"><?php echo h($ha_lists); ?></li>
                                            <!-- <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li> -->
                                        </ul>
                                    <?php
                                    endif;
                                    ?>
                                </div>

                                <div class="accordion sec-cho-inner-choo-ac">
                                    <p class="accordion-list sec-cho-inner-choo-ac-list">マ行</p>
                                    <?php
                                    if ($ma_lists = preg_grep('{^マ|^ミ|^ム|^メ|^モ}', $list_value)) :
                                    ?>
                                        <ul>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item"><?php echo h($ma_lists); ?></li>
                                            <!-- <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li> -->
                                        </ul>
                                    <?php
                                    endif;
                                    ?>
                                </div>

                                <div class="accordion sec-cho-inner-choo-ac">
                                    <p class="accordion-list sec-cho-inner-choo-ac-list">ヤ・ラ・ワ行</p>
                                    <?php
                                    if ($yarawa_lists = preg_grep('{^ヤ|^ユ|^ヨ|^ラ|^リ|^ル|^レ|^ロ|^ワ|^ヲ|^ン}', $list_value)) :
                                    ?>
                                        <ul>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item"><?php echo h($yarawa_lists); ?></li>
                                            <!-- <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li> -->
                                        </ul>
                                    <?php
                                    endif;
                                    ?>
                                </div>

                                <!-- <div class="accordion sec-cho-inner-choo-ac">
                                    <p class="accordion-list sec-cho-inner-choo-ac-list">その他</p>
                                    <?php
                                    if ($other_lists = preg_grep('^ア|^ｱ', $list_value)) :
                                    ?>
                                        <ul>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item"><?php echo h($other_lists); ?></li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                            <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                                        </ul>
                                    <?php
                                    endif;
                                    ?>
                                </div> -->

                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </section>

            <section id="section-custmer-register" class="sec-cus-reg">
                <div class="sec-cus-reg-inner">
                    <div class="inner-title sec-cus-reg-inner-tit">
                        <h2>お客様上がない場合は、下記より登録を行なって下さい。</h2>
                    </div>
                    <div class="sec-cus-reg-inner-jump">
                        <a href="register/">お客様情報の新規登録</a>
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

    <script src="js/accordion.js"></script>
    <script src="js/copyright.js"></script>

</body>

</html>
