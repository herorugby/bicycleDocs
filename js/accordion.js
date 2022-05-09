$(function () {
    $('.accordion-list').on('click', function () {
      $(this).next('ul').slideToggle();
    //openクラスをつける
    $(this).toggleClass("open");
    //クリックされていないaccordion-listのopenクラスを取る
    // $('.accordion-list').not(this).removeClass('open');

    // 一つ開くと他は閉じるように
    // $('.accordion-list').not($(this)).next('.accordion-item').slideUp();
  });
});
