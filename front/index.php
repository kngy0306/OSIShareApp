<?php
session_start();
require_once('../function/UserLogic.php');
$isUser = $_SESSION["login_user"];
$posts = UserLogic::getAllPost();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/style.css">
  <title>トップページ</title>
</head>

<body>
  <!-- Header -->
  <header>
    <div class="container pt-5 pb-5">
      <div class="row">
        <div class="col">
          <h2><a href="#top" class="top" id="top">OSIShareApp</a></h2>
        </div>
        <div class="col-md-auto">
          <?php if (!isset($isUser)) : ?>
          <a href="#">SignUp</a>
          <?php endif; ?>
        </div>
        <div class="col-md-auto">
          <?php if (!isset($isUser)) : ?>
          <a href="./login_form.php">SignIn</a>
          <?php else : ?>
          <a href="../front/mypage.php"><?php echo $isUser['name'] ?>のMyPageへ</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>

  <!-- Main -->
  <main>
    <div class="container main">
      <?php foreach ($posts as $post) : ?>
      <div class="card">
        <img src="../images/<?php echo $post["image"]; ?>" alt="" class="bd-placeholder-img card-img-top" width="100%"
          height="200">
        <div class="card-body">
          <h5 class="card-title"><?php echo $post["title"]; ?></h5>
          <p class="card-text"><?php echo $post["text"]; ?></p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </main>

  <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
</body>

</html>