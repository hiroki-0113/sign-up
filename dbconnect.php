<?php try {
  $db = new PDO('mysql:dbname=login;host=127.0.0.1;charset=utf8','root','root');
} catch (PDOException $e) {
  print('DBエラー:'.$e->getMessage());
};

?>