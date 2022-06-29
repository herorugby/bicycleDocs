<?php
// セッションがあるかを判定してからスタートする
if (!isset($_SESSION)) {
    session_start();
}

// アカウント重複確認をするためにdbに接続する
require_once('../dbconnect.php');

// function関数のファイルを呼び出し
require_once('../myfunc.php');

/*
------------------------------------
お客様の基本情報入力
------------------------------------
*/
// 名前の確認
$name_input = '';
if (isset($_POST['name'])) {
    $name_input = h($_POST['name']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['name'])) {
    $name_input = h($_SESSION['regist']['name']);
}

// ふりがなの確認
$kana_input = '';
if (isset($_POST['kana'])) {
    $kana_input = h($_POST['kana']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['kana'])) {
    $kana_input = h($_SESSION['regist']['kana']);
}

// Telの確認
$tel_input = '';
if (isset($_POST['tel'])) {
    $tel_input = h($_POST['tel']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['tel'])) {
    $tel_input = h($_SESSION['regist']['tel']);
}

// 携帯番号の確認
$sell_phone = '';
if (isset($_POST['sell_phone'])) {
    $sell_phone = h($_POST['sell_phone']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['sell_phone'])) {
    $sell_phone = h($_SESSION['regist']['sell_phone']);
}

// メール
$email_input = '';
if (isset($_POST['email'])) {
    $email_input = h($_POST['email']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['email'])) {
    $email_input = h($_SESSION['regist']['email']);
}

// 郵便番号
$zipcode_input = '';
if (isset($_POST['zipcode'])) {
    $zipcode_input = h($_POST['zipcode']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['zipcode'])) {
    $zipcode_input = h($_SESSION['regist']['zipcode']);
}

// 住所
$address_input = '';
if (isset($_POST['address'])) {
    $address_input = h($_POST['address']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['address'])) {
    $address_input = h($_SESSION['regist']['address']);
}

// 来店日
$date_input = '';
if (isset($_POST['regist_date'])) {
    $date_input = h($_POST['regist_date']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['regist_date'])) {
    $date_input = h($_SESSION['regist']['regist_date']);
}

// 車種
$body_input = '';
if (isset($_POST['body'])) {
    $body_input = h($_POST['body']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['body'])) {
    $body_input = h($_SESSION['regist']['body']);
}

// 車体番号
$frameno_input = '';
if (isset($_POST['frameno'])) {
    $frameno_input = h($_POST['frameno']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['frameno'])) {
    $frameno_input = h($_SESSION['regist']['frameno']);
}

// 防犯番号
$crimeno_input = '';
if (isset($_POST['crime_no'])) {
    $crimeno_input = h($_POST['crime_no']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['crime_no'])) {
    $crimeno_input = h($_SESSION['regist']['crime_no']);
}

/*
------------------------------------
ーー新車情報ーー
------------------------------------
*/
// メーカー
$maker_input = '';
if (isset($_POST['maker'])) {
    $maker_input = h($_POST['maker']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['maker'])) {
    $maker_input = h($_SESSION['regist']['maker']);
}

// 商品名
$products_input = '';
if (isset($_POST['products'])) {
    $products_input = h($_POST['products']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['products'])) {
    $products_input = h($_SESSION['regist']['products']);
}

// サイズカラー
$size_color_input = '';
if (isset($_POST['size_color'])) {
    $size_color_input = h($_POST['size_color']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['size_color'])) {
    $size_color_input = h($_SESSION['regist']['size_color']);
}

// 数量
$quantity_input = '';
if (isset($_POST['quantity'])) {
    $quantity_input = h($_POST['quantity']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['quantity'])) {
    $quantity_input = h($_SESSION['regist']['quantity']);
}

// 金額税抜
$amount_exclude_input = '';
if (isset($_POST['amount_exclude'])) {
    $amount_exclude_input = h($_POST['amount_exclude']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['amount_exclude'])) {
    $amount_exclude_input = h($_SESSION['regist']['amount_exclude']);
}

// 金額税込
$amount_include_input = '';
if (isset($_POST['amount_include'])) {
    $amount_include_input = h($_POST['amount_include']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['amount_include'])) {
    $amount_include_input = h($_SESSION['regist']['amount_include']);
}

// 合計金額税抜
$total_amount_exc_input = '';
if (isset($_POST['total_amount_exc'])) {
    $total_amount_exc_input = h($_POST['total_amount_exc']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['total_amount_exc'])) {
    $total_amount_exc_input = h($_SESSION['regist']['total_amount_exc']);
}

// 合計金額税込
$total_amount_inc_input = '';
if (isset($_POST['total_amount_inc'])) {
    $total_amount_inc_input = h($_POST['total_amount_inc']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['total_amount_inc'])) {
    $total_amount_inc_input = h($_SESSION['regist']['total_amount_inc']);
}

// 新車購入時メモ
$newmemo_input = '';
if (isset($_POST['newmemo'])) {
    $newmemo_input = h($_POST['newmemo']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['newmemo'])) {
    $newmemo_input = h($_SESSION['regist']['newmemo']);
}

/*
------------------------------------
ーー修理情報ーー
------------------------------------
*/
// 日付
$fix_date_input = '';
if (isset($_POST['fix_date'])) {
    $fix_date_input = h($_POST['fix_date']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['fix_date'])) {
    $fix_date_input = h($_SESSION['regist']['fix_date']);
}

// 修理内容メモ
$fixmemo_input = '';
if (isset($_POST['fixmemo'])) {
    $fixmemo_input = h($_POST['fixmemo']);
    //check.phpから戻ってきたときにSESSION['regist']があればエスケープ処理を変数に代入
} else if (isset($_SESSION['regist']['fixmemo'])) {
    $fixmemo_input = h($_SESSION['regist']['fixmemo']);
}

// ーーもし必須項目が空欄だったらの処理ーー
if (!empty($_POST)) {
    // 名前が空欄であればerrorの配列name内にblankを代入する
    if ($_POST['name'] === '') {
        $error['name'] = 'blank';
    }

    // フリガナが空欄であればerrorの配列kana内にblankを代入する
    if ($_POST['kana'] === '') {
        $error['kana'] = 'blank';
    }

    // ファイルの拡張子を確認するエラーチェック
    $fileName = $_FILES['image']['name'];
    if (!empty($fileName)) {
        if (preg_match('/\.png$|\.jpg$|\.jpeg$/i', $fileName)) {
        } else {
            $error['image'] = 'type';
        }
    }

    /*
    ------------------------------------
    エラーがなければページ遷移の処理を実行
    ------------------------------------
    */
    if (empty($error)) {
        // ファイルをアップロードした時間を取得し、ファイル名と連結する
        $image = date('YmdHis') . $_FILES['image']['name'];
        // 第一引数でファイルを一時的に保存する。第二引数でそれらを指定したフォルダに移動する。
        move_uploaded_file($_FILES['image']['tmp_name'], '../bicycle_pictures/' . $image);
        // エラーがなければregistにPOSTの内容を保存する。これでcheck.phpで値を参照できる
        $_SESSION['regist'] = $_POST;
        $_SESSION['regist']['body_picture'] = $image;
        header('Location: check.php');
        die();
    }
}

/*
------------------------------------
urlパラメーターにaction=rewriteがなければ変数に代入し、
あれば$_SESSION情報を$_POSTに変換する
------------------------------------
*/
$check = '';
if (isset($_REQUEST['action'])) {
    $check = $_REQUEST['action'] == 'rewrite';
} else if (isset($check) && isset($_SESSION['regist'])) {
    $_POST = $_SESSION['regist'];
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お客様情報登録</title>

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
                        <h2>お客様情報の登録</h2>
                    </div>
                    <div class="sec-reg-inner-contents contents">
                        <p>次のフォームに必要事項をご記載ください。</p>
                    </div>
                    <div class="form sec-reg-inner-form">
                        <form action="" method="post" enctype="multipart/form-data">

                            <!--
                                基本情報
                            -->

                            <!-- お名前 -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="name" class="form-item-label sec-reg-inner-form-item-label">お名前(全角)<span class="required">必須</span></label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="name" type="text" name="name" value="<?php echo $name_input; ?>" placeholder="山田　花子" required />
                                    <!-- <p class="error">*お客様のお名前を入力して下さい。</p> -->
                                </div>
                            </div>

                            <!-- フリガナ -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="kana" class="form-item-label sec-reg-inner-form-item-label">フリガナ(全角)<span class="required">必須</span></label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="kana" type="text" name="kana" value="<?php echo $kana_input; ?>" placeholder="ヤマダ　ハナコ" required />
                                    <!-- <p class="error">*お客様のフリガナを入力して下さい。</p> -->
                                </div>
                            </div>

                            <!-- Tel -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="tel" class="form-item-label sec-reg-inner-form-item-label">Tel(半角)</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="tel" type="tel" name="tel" value="<?php echo $tel_input; ?>" placeholder="012-345-6789" />
                                </div>
                            </div>

                            <!-- 携帯電話 -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="sell_phone" class="form-item-label sec-reg-inner-form-item-label">携帯(半角)</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="sell_phone" type="tel" name="sell_phone" value="<?php echo $sell_phone; ?>" placeholder="012-3456-7890" />
                                </div>
                            </div>

                            <!-- メール -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="email" class="form-item-label sec-reg-inner-form-item-label">メール</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="email" type="mail" name="email" value="<?php echo $email_input; ?>" placeholder="abcd123@efg.com" />
                                </div>
                            </div>

                            <!-- ご住所 -->
                            <!-- 郵便番号 -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="zipcode" class="form-item-label sec-reg-inner-form-item-label">郵便場号(半角)</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="zipcode" class="fwnormal" type="text" name="zipcode" onKeyUp="AjaxZip3.zip2addr(zipcode,'','address','address');" value="<?php echo $zipcode_input; ?>" placeholder="1234567" />
                                </div>
                            </div>

                            <!-- 住所 -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="address" class="form-item-label sec-reg-inner-form-item-label">住所</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="address" class="fwnormal" type="text" name="address" value="<?php echo $address_input; ?>" placeholder="自動入力されます。" />
                                </div>
                            </div>

                            <!-- ご来店日 -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="regist_date" class="form-item-label sec-reg-inner-form-item-label">初回ご来店日</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="regist_date" type="date" name="regist_date" value="<?php echo $date_input; ?>" />
                                </div>
                            </div>

                            <!-- 登録車種 -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="body" class="form-item-label sec-reg-inner-form-item-label">登録車種</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="body" type="text" name="body" value="<?php echo $body_input; ?>" placeholder="MARIN FAIRFAX XS GREEN" />
                                </div>
                            </div>

                            <!-- 車体No, -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="frameno" class="form-item-label sec-reg-inner-form-item-label">車体番号</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input type="text" name="frameno" value="<?php echo $frameno_input; ?>" placeholder="2203LF124FA" />
                                </div>
                            </div>

                            <!-- 防犯No, -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="crime_no" class="form-item-label sec-reg-inner-form-item-label">防犯登録番号</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="crime_no" type="text" name="crime_no" value="<?php echo $crimeno_input; ?>" placeholder="L-001234" />
                                </div>
                            </div>

                            <!-- サムネイル -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="body_picture" class="form-item-label sec-reg-inner-form-item-label">車体写真<br>※拡張子は.jpgもしくは.png</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="body_picture" type="file" name="body_picture" value="test" />
                                    <?php
                                    if (isset($error['body_picture']) && $error['body_picture'] === 'type') {
                                        echo '<p class="error">*写真の拡張子は、.jpg/.gif/.pngとなります。</p>';
                                    }
                                    // フォーム内にerrorがあれば下のエラーを表示する
                                    if (!empty($error)) {
                                        echo '<p class="error">*恐れ入りますが、画像を改めて指定してください。</p>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <!--
                                新車情報
                            -->
                            <table class="form-table new-bicycle sec-reg-inner-form-table">

                                <caption class="bold">--新車購入情報内容--</caption>

                                <thead>
                                    <tr>
                                        <th class="minth">---</th>
                                        <th>メーカー</th>
                                        <th>商品名</th>
                                        <th>サイズ・カラー</th>
                                        <th class="minth">数量</th>
                                        <th class="smallth">金額(税抜)</th>
                                        <th class="smallth">金額(税込)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="addForm">
                                        <td>
                                            <input class="btnDeleteNew" type="button" value="削除">
                                        </td>
                                        <td>
                                            <input type="text" name="maker" value="<?php echo $maker_input; ?>" />
                                        </td>
                                        <td>
                                            <input type="text" name="products" value="<?php echo $products_input; ?>" />
                                        </td>
                                        <td>
                                            <input type="text" name="size_color" value="<?php echo $size_color_input; ?>" />
                                        </td>
                                        <td class="numberBox">
                                            <input class="order_amount" type="number" name="quantity" value="<?php echo $quantity_input; ?>" />
                                        </td>
                                        <td class="taxExBox">
                                            <input class="taxEx" type="number" name="amount_exclude" value="<?php echo $amount_exclude_input; ?>" />
                                        </td>
                                        <td class="taxInBox">
                                            <input class="taxIn" type="number" name="amount_include" value="<?php echo $amount_include_input; ?>" />
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr class="sec-reg-inner-form-table-tot">
                                        <td class="sec-reg-inner-form-table-tot-txt bold" colspan="5">TOTAL</td>
                                        <td class="sec-reg-inner-form-table-tot-totaltaxex">
                                            <input class="totalTaxEx" type="number" name="total_amount_exc" value="<?php echo $total_amount_exc_input; ?>" />
                                        </td>
                                        <td class="sec-reg-inner-form-table-tot-totaltaxin">
                                            <input class="totalTaxIx" type="number" name="total_amount_inc" value="<?php echo $total_amount_inc_input; ?>" />
                                        </td>
                                    </tr>
                                    <tr class="sec-reg-inner-form-table-txt">
                                        <td colspan="7">
                                            <textarea name="newmemo" placeholder="備考欄：組み立て方法などを詳細などをメモしておく"><?php echo $newmemo_input; ?></textarea>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- 新車情報を記載する行を追加するボタン -->
                            <button type="button" id="addBtnNewBike">↑入力する場合は↑<br>↑ここをクリック↑</button>

                            <!--
                                修理情報
                            -->
                            <table class="form-table fix-bicycle sec-reg-inner-form-table">

                                <caption class="bold">--修理情報--</caption>

                                <thead>
                                    <tr>
                                        <th class="minth">---</th>
                                        <th class="midth">日付</th>
                                        <th>修理内容・メモ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="addForm">
                                        <td>
                                            <input class="btnDeleteFix" type="button" value="削除">
                                        </td>
                                        <td>
                                            <input type="date" name="fix_date" value="<?php echo $fix_date_input; ?>" />
                                        </td>
                                        <td>
                                            <textarea name="fixmemo" placeholder="備考欄：修理内容などをメモ"><?php echo $fixmemo_input; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- 修理情報を記載する行を追加するボタン -->
                            <button type="button" id="addBtnFixBike">↑入力する場合は↑<br>↑ここをクリック↑</button>

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

    <script src="../js/table.js"></script>
    <script src="../js/copyright.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</body>

</html>
