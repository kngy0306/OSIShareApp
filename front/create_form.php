<?php
session_start();
$err = $_SESSION;
if (isset($err["title"]) || isset($err["text"]) || isset($err["image"])) {
  var_dump($err);
}
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
  <title>新規投稿画面</title>
</head>

<body>
  <h2>投稿画面</h2>
  <form action="../function/create.php" method="POST" enctype="multipart/form-data">
    <p>
      <label for="title">タイトル: </label>
      <br>
      <input type="text" name="title">
    </p>
    <p>
      <label for="text">内容: </label>
      <br>
      <textarea name="text" cols="30" rows="10"></textarea>
    </p>
    <p>
      <label for="image">画像: </label>
      <br>
      <input type="file" name="image">
    </p>
    <p><input type="submit" value="投稿""></p>
  </form>
</body>

</html>