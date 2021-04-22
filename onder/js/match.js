//タイマー
let time =10;
var se_timer = new Audio('se/timer.mp3');
function timer(){
  if(time>0){
    time -=1;
    se_timer.play();
    $(".timer").html(time);
  }else if(time == 0){
    $(".zoom_trigger")[0].click();
  }
}
function timer_start(){
  timerID = setInterval(timer,1100);
}
//カード表示
var se_turn = new Audio('se/card.mp3');
setTimeout(card_open, 1000);
function card_open(){
  se_turn.play();
  $(".back").animate({
    width: 0
  }, 400, function() {
    $(".card").animate({
      width: 300
    },400)
    $(".card_prof").animate({
      opacity: 1
    },1200)
    // timer_start();-000000000000000000000000000000000000000000
  });
}
//キャンセル
$(".cancel").on("click",function(){
  window.location.href = 'index.php'; 
});

//ドラッグ
(function(){

  //要素の取得
  var elements = document.getElementsByClassName("drag-and-drop");

  //要素内のクリックされた位置を取得するグローバル（のような）変数
  var x;
  var y;

  //マウスが要素内で押されたとき、又はタッチされたとき発火
  for(var i = 0; i < elements.length; i++) {
      elements[i].addEventListener("mousedown", mdown, false);
      elements[i].addEventListener("touchstart", mdown, false);
  }

  //マウスが押された際の関数
  function mdown(e) {

      //クラス名に .drag を追加
      this.classList.add("drag");

      //タッチデイベントとマウスのイベントの差異を吸収
      if(e.type === "mousedown") {
          var event = e;
      } else {
          var event = e.changedTouches[0];
      }

      //要素内の相対座標を取得
      x = event.pageX - this.offsetLeft;
      y = event.pageY - this.offsetTop;

      //ムーブイベントにコールバック
      document.body.addEventListener("mousemove", mmove, false);
      document.body.addEventListener("touchmove", mmove, false);
  }

  //マウスカーソルが動いたときに発火
  function mmove(e) {

      //ドラッグしている要素を取得
      var drag = document.getElementsByClassName("drag")[0];

      //同様にマウスとタッチの差異を吸収
      if(e.type === "mousemove") {
          var event = e;
      } else {
          var event = e.changedTouches[0];
      }

      //フリックしたときに画面を動かさないようにデフォルト動作を抑制
      e.preventDefault();

      //マウスが動いた場所に要素を動かす
      drag.style.top = event.pageY - y + "px";
      drag.style.left = event.pageX - x + "px";

      //マウスボタンが離されたとき、またはカーソルが外れたとき発火
      drag.addEventListener("mouseup", mup, false);
      document.body.addEventListener("mouseleave", mup, false);
      drag.addEventListener("touchend", mup, false);
      document.body.addEventListener("touchleave", mup, false);

  }

  //マウスボタンが上がったら発火
  function mup(e) {
      var drag = document.getElementsByClassName("drag")[0];

      //ムーブベントハンドラの消去
      document.body.removeEventListener("mousemove", mmove, false);
      drag.removeEventListener("mouseup", mup, false);
      document.body.removeEventListener("touchmove", mmove, false);
      drag.removeEventListener("touchend", mup, false);

      //クラス名 .drag も消す
      drag.classList.remove("drag");
  }

})()