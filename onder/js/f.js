//index.php-----------------------------------------------------------------------------------------------------------------------
//ログインフォーム表示
$("body").on("click", ".btn_login", function(){
  $(".btns").css('display','none');
  $(".login_form").css('display','block');
});
//アカウント作成フォーム表示
$("body").on("click", ".btn_account", function(){
  $(".btns").css('display','none');
  $(".account_form").css('display','block');
});
//アカウント作成フォーム閉じ
$("body").on("click", ".form_area .batsu", function(){
  $(".form_area").css('display','none');
  $(".btns").css('display','block');
});
//マッチング画面
$("body").on("click", ".btn_match_start", function(){
  window.location.href = 'match.php'; 
});


