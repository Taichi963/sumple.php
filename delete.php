<?php
session_start();
require('dbconnect.php');
//SESSIONのIDが記録されていて自分のメッセージかを確認する
if (isset($_SESSION['id'])) {
//一時的に$idに格納
  $id = $_REQUEST['id'];
  //URLパラメータから取得したidを格納してSQLを走らせる
  $messages = $db->prepare('SELECT * FROM posts WHERE id=?');
  $messages->execute(array($id));
  $message = $messages->fetch();
//データベース内のmember_idと$_SESSIONのidが同じ場合に実行
  if($message['member_id'] == $_SESSION['id']) {
    $del = $db->prepare('DELETE FROM posts WHERE id=?');
    $del->execute(array($id));
  }
}
header('Location: index.php');
exit();
?>