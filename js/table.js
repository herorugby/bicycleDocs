/*******************************************************
今回改修したコード
*******************************************************/
let total_price = 0;
let total_price_taxex = 0;

// ボタンクリックで行を追加&削除
$(function () {

    // 新車情報フォームの行追加
    $("#addBtnNewBike").on("click", function () {
        $(".new-bicycle tbody tr:first-child") // テーブルの一番初めの行を指定する
            .clone(true)                     // 指定した一番初めの行のHTML要素を複製する
            .appendTo(".new-bicycle tbody");   // 複製した要素をtbodyに追加する

        // $(".new-bicycle tbody tr:last-child input").val(""); // 追加した行の値をクリアする
        // 複製後に表示させる
        $(".new-bicycle tbody tr:last-child").css("display", "table-row");

        let taxEx_DOM = document.getElementsByClassName("taxEx");
        let order_amount_DOM = document.getElementsByClassName("order_amount");
        let taxIn_DOM = document.getElementsByClassName("taxIn");
        let total_price_taxex_DOM = document.getElementsByClassName("sec-reg-inner-form-table-tot-totaltaxex");
        let total_price_taxin_DOM = document.getElementsByClassName("sec-reg-inner-form-table-tot-totaltaxin");

        //数量の値を変更したときの処理
        for (let i = 0; i < order_amount_DOM.length; i++) {
            order_amount_DOM[i].addEventListener("change", function () {
                //小計（入力金額×数量）
                subtotal_price = order_amount_DOM[i].value * taxEx_DOM[i].value;
                //小計 税込み価格
                let subtotal_price_taxin = Math.round(subtotal_price * 1.1);
                taxIn_DOM[i].value = subtotal_price_taxin;

                total_price_taxin = 0;
                total_price_taxex = 0;
                for (let j = 0; j < taxEx_DOM.length; j++) {
                    //合計金額
                    console.log(parseInt(taxIn_DOM[j].value));
                    total_price_taxin += parseInt(taxIn_DOM[j].value);
                    total_price_taxin_DOM[0].innerHTML = "￥" + total_price_taxin;
                    //税抜き金額
                    total_price_taxex += order_amount_DOM[j].value * taxEx_DOM[j].value;
                    total_price_taxex_DOM[0].innerHTML = "￥" + total_price_taxex;
                }
            })
        }
        //金額（税抜き）の値を変更したときの処理
        for (let i = 0; i < taxEx_DOM.length; i++) {
            taxEx_DOM[i].addEventListener("change", function () {
                //小計（入力金額×数量）
                subtotal_price = order_amount_DOM[i].value * taxEx_DOM[i].value;
                //小計 税込み価格
                let subtotal_price_taxin = Math.round(subtotal_price * 1.1);
                taxIn_DOM[i].value = subtotal_price_taxin;

                total_price_taxin = 0;
                total_price_taxex = 0;
                for (let j = 0; j < taxEx_DOM.length; j++) {
                    //合計金額
                    console.log(parseInt(taxIn_DOM[j].value));
                    total_price_taxin += parseInt(taxIn_DOM[j].value);
                    total_price_taxin_DOM[0].innerHTML = "￥" + total_price_taxin;
                    //税抜き金額
                    total_price_taxex += order_amount_DOM[j].value * taxEx_DOM[j].value;
                    total_price_taxex_DOM[0].innerHTML = "￥" + total_price_taxex;
                }
            })
        }
        //金額（税抜き）の値を変更したときの処理
        for (let i = 0; i < taxIn_DOM.length; i++) {
            taxIn_DOM[i].addEventListener("change", function () {
                //金額（税抜き）の値を変更したときに処理追加するときはこちらに記入
                //（jQueryで書いても大丈夫です）
            })
        }
    });
    // 新車情報行削除
    $(".btnDeleteNew").on("click", function () {
        $(this).parent().parent().remove();
        $('sec-reg-inner-form-table-tot-totaltaxex').remove();
    });

    // 修理自転車フォームの行追加
    $("#addBtnFixBike").on("click", function () {
        $(".fix-bicycle tbody tr:first-child") // テーブルの一番初めの行を指定する
            .clone(true)                     // 指定した一番初めの行のHTML要素を複製する
            .appendTo(".fix-bicycle tbody");   // 複製した要素をtbodyに追加する

        // $(".fix-bicycle tbody tr:last-child input").val(""); // 追加した行の値をクリアする

        // 複製後に表示させる
        $(".fix-bicycle tbody tr:last-child").css("display", "table-row");
    });
    // 修理情報行削除
    $(".btnDeleteFix").on("click", function () {
        $(this).parent().parent().remove();
    });
});







/*******************************************************
以下 小野さんの元のコード
*******************************************************/

/* // ボタンクリックで行を追加&削除
$(function () {

    // 新車情報フォームの行追加
    $("#addBtnNewBike").on("click", function () {
        $(".new-bicycle tbody tr:first-child") // テーブルの一番初めの行を指定する
            .clone(true)                     // 指定した一番初めの行のHTML要素を複製する
            .appendTo(".new-bicycle tbody");   // 複製した要素をtbodyに追加する

        // $(".new-bicycle tbody tr:last-child input").val(""); // 追加した行の値をクリアする
        // 複製後に表示させる
        $(".new-bicycle tbody tr:last-child").css("display", "table-row");

    });
    // 新車情報行削除
    $(".btnDeleteNew").on("click", function () {
        $(this).parent().parent().remove();
        $('sec-reg-inner-form-table-tot-totaltaxex').remove();
    });

    // 修理自転車フォームの行追加
    $("#addBtnFixBike").on("click", function () {
        $(".fix-bicycle tbody tr:first-child") // テーブルの一番初めの行を指定する
            .clone(true)                     // 指定した一番初めの行のHTML要素を複製する
            .appendTo(".fix-bicycle tbody");   // 複製した要素をtbodyに追加する

        // $(".fix-bicycle tbody tr:last-child input").val(""); // 追加した行の値をクリアする

        // 複製後に表示させる
        $(".fix-bicycle tbody tr:last-child").css("display", "table-row");
    });
    // 修理情報行削除
    $(".btnDeleteFix").on("click", function () {
        $(this).parent().parent().remove();
    });
});

// 各行の税込計算を入れたい
// 税込金額を入れたら税抜金額も計算してほしい
// 税抜の¥マークを入れたい

// 合計金額の計算
$(".new-bicycle").on('change keyup', '.taxEx', function () {
    var calc_total_sum_taxex = 0;
    var calc_sum_taxin = 0;
    var calc_total_sum_taxin = 0;

    $(".new-bicycle .taxEx").each(function () {
        var get_txtbox_val = $(this).val();
        if ($.isNumeric(get_txtbox_val)) {
            get_txtbox_val.replace(/^[0]+/, '');
            // 税抜の足す計算
            calc_total_sum_taxex += parseFloat(get_txtbox_val);
            // 税込の計算
            calc_sum_taxin += Math.round(get_txtbox_val * 1.1);
            // 税込の合計計算
            calc_total_sum_taxin = Math.round(calc_total_sum_taxex * 1.1);
        }
    });
    $(".sec-reg-inner-form-table-tot-totaltaxex").html("¥" + calc_total_sum_taxex);
    $(".taxInBox").html("¥" + calc_sum_taxin);
    $(".sec-reg-inner-form-table-tot-totaltaxin").html("¥" + calc_total_sum_taxin);
});
 */
