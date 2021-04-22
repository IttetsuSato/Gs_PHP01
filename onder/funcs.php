<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//LOGIN認証チェック関数
function index_loginCheck(){
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){
    include("if_notlogin.html");
  }else{
    include("if_login.html");
    session_regenerate_id(true); //セッションハイジャック対策
    $_SESSION["chk_ssid"] = session_id();
  }
}
function loginCheck(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){
    echo "LOGIN Error!";
    exit();
  }else{
    session_regenerate_id(true); //セッションハイジャック対策
    $_SESSION["chk_ssid"] = session_id();
  }
}
//データベース接続
function db_connect(){
  //localhost
  // try {
  //   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');//host=データベースのipアドレス
  // } catch (PDOException $e) {
  //   exit('DbConnectError:'.$e->getMessage());
  // }
  // return $pdo;
  //sakura
  try {
    $dsn = 'mysql:dbname=makeyouhappy_onder;host=mysql57.makeyouhappy.sakura.ne.jp;charset=utf8;unix_socket=/tmp/mysql.sock';
    $user = 'makeyouhappy';
    $password = 'D4e74a2ue-cX';
    $pdo = new PDO($dsn, $user, $password);
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}
?>