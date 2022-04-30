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

// 合計金額の計算
$(".new-bicycle").on('change keyup', '.taxEx', function () {
       var calculated_total_sum = 0;

       $(".new-bicycle .taxEx").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }
            });
              $(".sec-reg-inner-form-table-tot-totaltaxex").html("¥" + calculated_total_sum);
       });
