<?php
session_start();
require('dbconnect.php');

if (!empty($_POST)) {
   if ($_POST['name'] === '') {
      $error['name'] = 'empty';
   }
   if ($_POST['email'] === '') {
      $error['email'] = 'empty';
   }
   if (strlen($_POST['password'])<4) {
     $error['password'] = 'length';
   }
   if ($_POST['password'] === '') {
      $error['password'] = 'empty';
   }
   //エラー要素が空ならcheck.phpに移動
   if (empty($error)) {
      $_SESSION['join'] = $_POST;
      header('Location:check.php');
      exit();
   }
    if($_REQUEST['action'] == 'change'  && isset($_SESSION['join'])){
      $_POST = $_SESSION['join'];
   }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録フォーム</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
     body{
         background-color:rgba(131, 131, 131, 0.445);
      }
     .must{
         color: rgb(11, 11, 158);
         margin: 30px;
      }
      .atention{
         color: red;
      }
      h1{
          border-bottom:solid 3px black;
      }
  </style>
</head>
<body class="p-3 mb-2 bg-light text-dark">
     <div>
     <h1>新規登録</h1>
     <p>次のフォームに必要事項をお書きください</p>
   <form action="" method="post">
   <dl>
    <dt>氏名<span class="must">必須</span></dt>
      <dd>
        <input type="text" name="name" size="35" maxlength="255" value="<?php 
			   print(htmlspecialchars($_POST['name'],ENT_QUOTES)); ?>">
         <?php if($error['name'] === 'empty'): ?>
             <p class="atention">⚠️氏名を入力してくだささい。</p>
           <?php endif; ?>
      </dd>
    <dt>メールアドレス<span class="must">必須</span></dt>
      <dd>
         <input type="text" name="email" size="35" maxlength="255" value="<?php 
				print(htmlspecialchars($_POST['email'],ENT_QUOTES)); ?>">
         <?php if($error['email'] === 'empty'): ?>
            <p class="atention">⚠️メールアドレスを入力してくだささい。</p>
         <?php endif; ?>
      </dd>
    <dt>パスワード(4文字以上)<span class="must">必須</span></dt>
      <dd>
          <input type="password" name="password" size="15" maxlength="255" value="<?php 
				print(htmlspecialchars($_POST['password'],ENT_QUOTES)); ?>">
         <?php if($error['password'] === 'empty'): ?>
            <p class="atention">⚠️パスワードを入力してくだささい。</p>
         <?php endif; ?>
         <?php if($error['password'] === 'length'):?>
	   	   <p class="atention">⚠️パスワードは4文字以上で入力してください</p>
         <?php endif; ?>
      </dd>
 </dl>
 <div><input type="submit" class="btn btn-secondary" value="入力内容確認"></div>
</form>
</div>
</body>
</html>