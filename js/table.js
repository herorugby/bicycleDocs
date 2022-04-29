// $(function () {
//     $('#add').click(function () {
//         var maker = $("#maker").val();
//         var products = $("#products").val();
//         var sizecolor = $("#sizecolor").val();
//         var quantity = $("#quantity").val();
//         var pricetaxex = $("#pricetaxex").val();
//         $('')
//     });
// })

$(function () {

    // 新車情報フォームの行追加
    $("#addBtnNewBike").on("click", function () {
        $(".new-bicycle tbody tr:first-child") // テーブルの一番初めの行を指定する
            .clone(true)                     // 指定した一番初めの行のHTML要素を複製する
            .appendTo(".new-bicycle tbody");   // 複製した要素をtbodyに追加する

        $(".new-bicycle tbody tr:last-child input").val(""); // 追加した行の値をクリアする

    });

    // 修理自転車のフォーム行追加
    $("#addBtnFixBike").on("click", function () {
        $(".fix-bicycle tbody tr:first-child") // テーブルの一番初めの行を指定する
            .clone(true)                     // 指定した一番初めの行のHTML要素を複製する
            .appendTo(".fix-bicycle tbody");   // 複製した要素をtbodyに追加する

        $(".fix-bicycle tbody tr:last-child input").val(""); // 追加した行の値をクリアする

    });
});
