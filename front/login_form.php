<?php
require_once('../function/dbconnect.php');
// エラー出力
ini_set('display_errors', "On");
session_start();
// require_once('../classes/UserLogic.php');

$err = $_SESSION;

// $result = UserLogic::checkLogin();
// if ($result) {
// header('Location: mypage.php');
// return;
// }

$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  .error {
    color: red;
  }
  </style>
  <title>ログイン画面</title>
</head>

<body>
  <h2>ログインフォーム</h2>
  <form action="../function/login.php" method="POST">
    <p>
      <label for="email">メールアドレス: </label>
      <input type="text" name="email">
    </p>
    <?php if (isset($err['email'])) : ?>
    <p class="error"><?php echo $err['email']; ?></p>
    <?php endif ?>
    <p>
      <label for="passwd">パスワード: </label>
      <input type="password" name="password">
    </p>
    <?php if (isset($err['password'])) : ?>
    <p class="error"><?php echo $err['password']; ?></p>
    <?php endif ?>
    <p><input type="submit" value="ログイン"></p>
  </form>
  <a href="">新規登録はこちら</a>
</body>

</html>