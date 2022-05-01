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

    });
    // 新車情報行削除
    $(".btnDeleteNew").on("click", function() {
    $(this).parent().parent().remove();
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
    $(".btnDeleteFix").on("click", function() {
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
            get_txtbox_val.replace(/^[0]+/,'');
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
