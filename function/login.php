<?php
session_start();
require_once('./UserLogic.php');

// エラーメッセージを保存する配列
$error = [];

if (!$email = filter_input(INPUT_POST, "email")) {
  $error['email'] = "メールアドレスを入力してください。";
}
if (!$password = filter_input(INPUT_POST, "password")) {
  $error['password'] = "パスワードを入力してください。";
}

// どちらかにエラーがあれば元のファイルへリダイレクトし、セッションファイルにエラーを挿入
if (count($error) > 0) {
  $_SESSION = $error;
  header("Location: ../front/login_form.php");
  return;
}

$result = UserLogic::login($email, $password);

if (!$result) {
  header("Location: ../front/login_form.php");
  return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン完了</title>
</head>

<body>
  <h2>ログイン完了</h2>
  <p>ログインしました。</p>
  <a href="../front/index.php">トップページへ</a>
  <a href="../front/mypage.php">マイページへ</a>

</body>

</html>