/*
  ⑤jQueryによる画面部品の機能初期設定
  
  ★学習のポイント
    ・無名関数
    ・画面部品のフェードアウト
    ・slickスライダー
    ・jQueryの追加ライブラリによる漢字<->かな変換
*/
$(document).ready(function(){  
  // Slickによる画像スライダー
  $('.slick-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,
  });
});
