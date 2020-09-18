<?php
require_once('../env/env.php');
ini_set('display_errors', "On");

function connect()
  {
    $host = DB_HOST;
    $db = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

    try {
      $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);
      return $pdo;
    } catch (PDOException $e) {
      echo "接続失敗" . $e;
      exit();
    }
  }

function getAll()
  {
    $table_name = USER_TABLE;
    
    $dbh = connect();
    $sql = "SELECT * FROM $table_name";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;

    $dbh = null;
}