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
                                <label for="namae" class="form-item-label sec-reg-inner-form-item-label">お名前(全角)<span class="required">必須</span></label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="namae" type="text" name="namae" value="<?php echo $namae_input; ?>" placeholder="山田　花子" required />
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
                                <label for="sell" class="form-item-label sec-reg-inner-form-item-label">携帯(半角)</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="sel" type="tel" name="sell" value="<?php echo $sell_input; ?>" placeholder="012-3456-7890" />
                                </div>
                            </div>

                            <!-- メール -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="email" class="form-item-label sec-reg-inner-form-item-label">メール</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="email" type="mail" name="email" value="<?php echo $email_input; ?>" placeholder="abcd123@efg.com" />
                                </div>
                            </div>

                            <!-- 住所 -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="jusyo" class="form-item-label sec-reg-inner-form-item-label">ご住所</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <p class="bold">郵便番号(半角)<input id="jusyo" class="fwnormal" type="text" name="郵便番号" onKeyUp="AjaxZip3.zip2addr(this,'','住所','住所');" placeholder="1234567" /></p>
                                    <p class="bold">ご住所<input id="jusyo" class="fwnormal" type="text" name="住所" value="<?php echo $jusyo_input; ?>" placeholder="自動入力されます。" /></p>
                                </div>
                            </div>

                            <!-- ご来店日 -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="date" class="form-item-label sec-reg-inner-form-item-label">初回ご来店日</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="date" type="date" name="date" value="<?php echo $date_input; ?>" />
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
                                <label for="registno" class="form-item-label sec-reg-inner-form-item-label">防犯登録番号</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="registno" type="text" name="registno" value="<?php echo $registno_input; ?>" placeholder="L-001234" />
                                </div>
                            </div>

                            <!-- サムネイル -->
                            <div class="form-item sec-reg-inner-form-item">
                                <label for="image" class="form-item-label sec-reg-inner-form-item-label">車体写真<br>※拡張子は.jpgもしくは.png</label>
                                <div class="form-item-input sec-reg-inner-form-item-input">
                                    <input id="image" type="file" name="image" value="test" />
                                    <?php
                                    if (isset($error['image']) && $error['image'] === 'type') {
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
                                            <input type="text" name="sizecolor" value="<?php echo $sizecolor_input; ?>" />
                                        </td>
                                        <td>
                                            <input type="number" name="quantity" value="<?php echo $quantity_input; ?>" />
                                        </td>
                                        <td>
                                            <input class="taxEx" type="number" name="pricetaxex" value="<?php echo $pricetaxex_input; ?>" />
                                        </td>
                                        <td class="taxInBox">
                                            <input class="taxIn" type="number" name="pricetaxin" value="<?php echo $pricetaxin_input; ?>" />
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr class="sec-reg-inner-form-table-tot">
                                        <td class="sec-reg-inner-form-table-tot-txt bold" colspan="5">TOTAL</td>
                                        <td class="sec-reg-inner-form-table-tot-totaltaxex">
                                            <input class="totalTaxEx" type="number" name="totalpricetaxex" value="<?php echo $totalpricetaxex_input; ?>" />
                                        </td>
                                        <td class="sec-reg-inner-form-table-tot-totaltaxin">
                                            <input class="totalTaxIx" type="number" name="totalpricetaxin" value="<?php echo $totalpricetaxin_input; ?>" />
                                        </td>
                                    </tr>
                                    <tr class="sec-reg-inner-form-table-txt">
                                        <td colspan="7">
                                            <textarea name="memo" 　value="<?php echo $memo_input; ?>" placeholder="備考欄：組み立て方法などを詳細などをメモしておく"></textarea>
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
                                            <input type="date" name="fixdate" value="<?php echo $fixdate_input; ?>" />
                                        </td>
                                        <td>
                                            <textarea name="fixmemo" value="<?php echo $fixmemo_input; ?>" placeholder="備考欄：修理内容などをメモ"></textarea>
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
