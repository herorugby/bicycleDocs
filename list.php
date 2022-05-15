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

                        <div class="accordion sec-cho-inner-choo-ac">
                            <p class="accordion-list sec-cho-inner-choo-ac-list">ア行</p>
                            <ul>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                            </ul>
                        </div>

                        <div class="accordion sec-cho-inner-choo-ac">
                            <p class="accordion-list sec-cho-inner-choo-ac-list">カ行</p>
                            <ul>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                            </ul>
                        </div>

                        <div class="accordion sec-cho-inner-choo-ac">
                            <p class="accordion-list sec-cho-inner-choo-ac-list">サ行</p>
                            <ul>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                            </ul>
                        </div>

                        <div class="accordion sec-cho-inner-choo-ac">
                            <p class="accordion-list sec-cho-inner-choo-ac-list">タ行</p>
                            <ul>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                            </ul>
                        </div>

                        <div class="accordion sec-cho-inner-choo-ac">
                            <p class="accordion-list sec-cho-inner-choo-ac-list">ナ行</p>
                            <ul>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                            </ul>
                        </div>

                        <div class="accordion sec-cho-inner-choo-ac">
                            <p class="accordion-list sec-cho-inner-choo-ac-list">ハ行</p>
                            <ul>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                            </ul>
                        </div>

                        <div class="accordion sec-cho-inner-choo-ac">
                            <p class="accordion-list sec-cho-inner-choo-ac-list">マ行</p>
                            <ul>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                            </ul>
                        </div>

                        <div class="accordion sec-cho-inner-choo-ac">
                            <p class="accordion-list sec-cho-inner-choo-ac-list">ヤ・ラ・ワ行</p>
                            <ul>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                            </ul>
                        </div>

                        <div class="accordion sec-cho-inner-choo-ac">
                            <p class="accordion-list sec-cho-inner-choo-ac-list">その他</p>
                            <ul>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ2</li>
                                <li class="accordion-item sec-cho-inner-choo-ac-item">それぞれ3</li>
                            </ul>
                        </div>
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