<?php
//2. DB接続
include("funcs.php");
$pdo = db_connect();

$sql = "SELECT COUNT(*) FROM onder"; 
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if($status==false){
  $error =$stmt->errorInfo();
  exit("QueryError:".$error[2]); 
}else{
  $row = $stmt->fetch();
  $length = $row[0];
  }
$random = rand ( 1 , $length ); 


//3. データ表示SQL作成
$sql = "SELECT*FROM onder WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $random, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  $error =$stmt->errorInfo();
  exit("QueryError:".$error[2]); 
}else{
  $row = $stmt->fetch();
}
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
<!-- タイマー -->
  <div class="timer">10</div>

<!-- カード -->
  <div class="back"><img src="images/cardback.jpeg" alt=""></div>
  <div class="card drag-and-drop">
    <div class="card_img"><img src="images/img-1.jpg" alt=""></div>
    <div class="card_prof">
      <div class="card_top">
        <div class="card_name"><?=$row["name"]?></div>
        <div class="card_grade"><?=$row["grade"]?></div>
      </div>
      <div class="card_middle">
        <div class="card_college"><?=$row["college"]?></div>
        <div class="card_department"><?=$row["department"]?></div>
      </div>
      <div class="card_bottom">
        <div class="card_hobby"><?=$row["hobby"]?></div>
      </div>
      <div class="card_hitokoto"><?=$row["hitokoto"]?></div>
    </div>
  </div>

<!-- バック -->
<div class="cancel">戻る</div>

  <?=include('zoom.php')?>
  <script src="js/match.js"></script>
</body>
</html>