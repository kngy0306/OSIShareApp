<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録画面</title>
</head>

<body>
  <form action="../function/register.php" method="POST">
    <p>
      <label for="username">ユーザ名: </label>
      <input type="text" name="username">
    </p>
    <p>
      <label for="email">メールアドレス: </label>
      <input type="text" name="email">
    </p>
    <p>
      <label for="passwd">パスワード: </label>
      <input type="password" name="password">
    </p>
    <p>
      <label for="pass_check">パスワード確認: </label>
      <input type="password" name="pass_check">
    </p>
    <p><input type="submit" value="新規登録"></p>
    <a href="./login_form.php">ログインする</a>

</body>

</html>