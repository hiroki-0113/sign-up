<?php
session_start();
require('dbconnect.php');
if (!isset($_SESSION['join'])) {
  header('Location:index.php');
  exit();
}

if (!empty($_POST)) {
  $sql = $db->prepare('INSERT INTO members SET name=?,email=?,password=?');
  $sql->execute(array(
    $_SESSION['join']['name'],
    $_SESSION['join']['email'],
    sha1($_SESSION['join']['password'])
  ));
  unset($_SESSION['join']);
  header("Location:last.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>確認フォーム</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    body{
      font-size:20px;
    }
    h1{
      border-bottom:solid 3px black;
    }
  </style>
</head>
<body>
  <div class="p-3 mb-2 bg-light text-dark">
    <form action="" method="post">
  <h1>入力確認</h1>
  <dl>
    <dt>氏名</dt>
    <dd><?php print($_SESSION['join']['name']) ?></dd>
    <dt>メールアドレス</dt>
    <dd><?php print($_SESSION['join']['email']) ?></dd>
    <dt>パスワード</dt>
    <dd>表示されません</dd>
    <a href="index.php?action=change" class="btn btn-secondary">書き直す</a> 
    <input type="submit" class="btn btn-secondary" value="登録">
  </form>
  </dl>
</div>
</body>
</html>