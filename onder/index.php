<?php
session_start();
include("funcs.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?=index_loginCheck()?>
<!-- ログインフォーム -->
<div class="form_area login_form">
  <div class="form_title_wrapper">
    <div class="logo"></div>
    <p>ログイン</p>
    <div class="batsu">×</div>
  </div>
  <form action="login_act.php" method="post">
  <div class="form_left">
    <label><p class="label">メールアドレス:</p>        <input type="email"  name="mail"></label><br>
    <label><p class="label">パスワード:</p><input type="text" name="lpw"></label><br>
    <input class="btn_sakusei" type="submit" value="ログイン">
    
  </div>
  </form>
</div>

<!-- アカウント作成フォーム -->
<div class="form_area account_form">
  <div class="form_title_wrapper">
    <div class="logo"></div>
    <p>アカウントを作成する</p>
    <div class="batsu">×</div>
  </div>
  <form action="insert.php" method="post">
  <div class="form_left">
    <label><p class="label">お名前:</p>        <input type="text"  name="name"></label><br>
    <label><p class="label">メールアドレス:</p><input type="email" name="mail"></label><br>
    <label><p class="label">パスワード:</p>    <input type="text"  name="lpw"></label><br>
    <label><p class="label">大学名:</p>        <input type="text"  name="college"></label><br>
    <label class="grade_label"><p class="label">学年:</p>          <select name="grade">
                            <option value="1年生">1年生</option>
                            <option value="2年生">2年生</option>
                            <option value="3年生">3年生</option>
                            <option value="4年生">4年生</option>
                            <option value="院1年生">院1年生</option>
                            <option value="院2年生">院2年生</option>
                            <option value="その他">その他</option>
                          </select>
      </label><br>
    <label><p class="label">学部:</p>          <input type="text"  name="department"></label><br>
  </div>
  <div class="form_right">
    <label><p class="label">趣味:</p>          <input type="text"  name="hobby"></label><br>
    <label><p class="label">写真:</p>          <input type="text"  name="img"></label><br>
    <label><p class="label">ひとこと:</p>      <textarea name="hitokoto"  cols="40"></textarea></label><br>
      <input class="btn_sakusei" type="submit" value="作成する">
  </div>
  </form>
</div>

  <script src="js/f.js"></script>
</body>
</html>