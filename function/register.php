<?php
require_once('./UserLogic.php');

$err = [];

if (!$username = filter_input(INPUT_POST, "username")) {
  $err[] = "ユーザ名を入力してください。";
}
if (!$email = filter_input(INPUT_POST, "email")) {
  $err[] = "emailを入力してください。";
}
if (!$password = filter_input(INPUT_POST, "password")) {
  $err[] = "passwordを入力してください。";
}
$pass_check = filter_input(INPUT_POST, 'pass_check');
if ($password !== $pass_check) {
  $err[] = '確認用パスワードが異なります';
}

if (count($err) === 0) {
  $signup = UserLogic::signup($_POST);

  if (!$signup) {
    $err[] = "登録失敗";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録結果</title>
</head>

<body>
  <?php if (count($err) > 0) : ?>
  <?php foreach ($err as $e) : ?>
  <p><?php echo $e ?></p>
  <?php endforeach ?>
  <?php else : ?>
  <p>登録完了しました。</p>
  <a href="../front/login_form.php">ログインページへ</a>
  <?php endif ?>
</body>

</html>