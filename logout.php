<?php
session_start();

//sessionの情報を削除する
$_SESSION = array(); 
//sessionにcookieを使うかどうかの設定ファイル
if (ini_get('session.get_cookies')) {
//クッキーの情報を削除する
  $params = session_get_cookie_params();
  //cookieの有効期限を切る
  setcookie(session_name() . '', time() - 42000,
  $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

session_destroy();
setcookie('email', '', time()-3600);
header('Location: login.php');
exit();
?>