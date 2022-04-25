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

$(function() {
 $("#addBtn").on("click", function() {
  // テーブルの最終行をクローンしてテーブルの最後に追加する
  $(".new-bicycle .addForm tr:last-child").clone(true).appendTo(".new-bicycle tbody");
 });
});
