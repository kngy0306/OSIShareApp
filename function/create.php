<?php
session_start();
require_once('./UserLogic.php');
$isUser = $_SESSION["login_user"];

$error = [];

if (!$title = filter_input(INPUT_POST, "title")) {
  $error['title'] = "タイトルを入力してください。";
}
if (!$text = filter_input(INPUT_POST, "text")) {
  $error['text'] = "テキストを入力してください。";
}
$image = basename($_FILES["image"]["name"]);

$filePath = "../images/" . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $filePath);

$contributer_id = $isUser["id"];

if (count($error) > 0) {
  $_SESSION = $error;
  header("Location: ../front/create_form.php");
  return;
}

$result = UserLogic::create($contributer_id, $title, $text, $image);

if (!$result) {
  header("Location: ../front/create_form.php");
  return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿完了</title>
</head>

<body>
  <h1>投稿完了</h1>
  <a href="../front/mypage.php">マイページへ</a>
</body>

</html>