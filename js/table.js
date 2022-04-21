$(function(){
  // 画面表示時に価格の合計値を計算
//   var sum_price = sum();

  // addボタン押下時の処理
//   $("#add").click(function(){
//     var name = $("#product_name").val();
//     var price = $("#product_price").val();
//     $('table').append('<tr><td>'+ name
//                       +'</td><td class="price">'+price
//                       +'</td></tr>');
    // 合計値を再計算
//     var sum_price = sum();
//   });

  function sum(){
    // 表の金額を取得する(tdの奇数列を取得)
    var pricelist = $("table td[id=price]").map(function(index, val){
      var price = parseInt($(val).text());
      if(price >= 0) {
        return price;
      } else {
        return null;
      }
    });
    // 価格の合計を求める
    var total = 0;
    pricelist.each(function(index, val){
      total = total + val;
    });
    $(".sum_price").text("¥"+total);
  }
});
