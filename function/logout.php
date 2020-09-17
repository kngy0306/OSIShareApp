<?php
session_start();
require_once('./UserLogic.php');

if (!$logout = filter_input(INPUT_POST, "logout")) {
  exit("不正なリクエスト");
}

if (UserLogic::logout()) {
  header("Location: ../front/index.php");
  return;
}