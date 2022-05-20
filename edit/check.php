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
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- フリガナ -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">フリガナ</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- Tel -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">Tel</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- 携帯 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">携帯番号</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- メールアドレス -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">メールアドレス</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- ご住所 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">ご住所</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- 来店日 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">初回ご来店日</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- 車種 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">登録車種</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- 車体番号 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">車体番号</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- 防犯登録番号 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">防犯登録番号</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <p>入力内容を表示する</p>
                                </div>
                            </div>

                            <!-- 車体写真 -->
                            <div class="form-item sec-che-inner-form-item">
                                <label class="form-item-label sec-che-inner-form-item-label">車体写真</label>
                                <div class="form-item-input sec-che-inner-form-item-input">
                                    <img src="" alt="車体写真">
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
                                        <td>メーカー表示</td>
                                        <td>商品名表示</td>
                                        <td>サイズ・カラー表示</td>
                                        <td>数量表示</td>
                                        <td>金額(税抜)表示</td>
                                        <td>金額(税込)表示</td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr class="sec-che-inner-form-table-tot">
                                        <td class="sec-che-inner-form-table-tot-txt bold" colspan="4">TOTAL</td>
                                        <td class="sec-che-inner-form-table-tot-totaltaxex">¥</td>
                                        <td class="sec-che-inner-form-table-tot-totaltaxin">¥</td>
                                    </tr>
                                    <tr class="sec-che-inner-form-table-txt">
                                        <td colspan="6">
                                            入力内容を表示
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
                                    <tr>
                                        <td>日付の選択日を表示</td>
                                        <td>修理内容を表示</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="sec-che-inner-form-rewrite flex-box">
                                <a class="button-a" href="">書き直す</a>
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
