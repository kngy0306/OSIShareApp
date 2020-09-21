<?php
require_once('../function/dbconnect.php');
ini_set('display_errors', "On");


class UserLogic
{
  /**
   * ログイン処理
   * @param string $email $password
   * @param string $passwd
   * @return bool $result
   */
  public static function login($email, $password)
  {
    $result = false;

    //メールからユーザを取得
    $user = self::getUserByEmail($email);

    // error1
    if (!$user) {
      $_SESSION['msg'] = "emailが一致しません";
      return $result;
    }
    // error2
    if ($user["password"] !== $password) {
      $_SESSION['msg'] = "passwordが一致しません";
      return $result;
    }

    // sessionファイルのlogin_userにユーザ情報を保存
    $_SESSION["login_user"] = $user;
    $result = true;
    return $result;
  }

  /**
   * 新規登録処理
   * @param string $uerData
   * @return bool true|false
   */
  public static function signup($userData)
  {
    $result = false;
    $sql = "INSERT INTO users(name, email, password) VALUES (?,?,?)";

    $arr = [];
    $arr[] = $userData["username"];
    $arr[] = $userData["email"];
    $arr[] = $userData["password"];

    try {
      $stmt = connect()->prepare($sql);
      $result = $stmt->execute($arr);
      return $result;
    } catch (Exception $e) {
      echo $e;
      return $result;
    }
  }

  /**
   * emailからユーザを取得
   * @param string $email
   * @return array|bool $user|false
   */
  public static function getUserByEmail($email)
  {
    $sql = "SELECT * FROM users WHERE email = ?";

    $arr = [];
    $arr[] = $email;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $user = $stmt->fetch();
      return $user;
    } catch (Exception $e) {
      return false;
    }
  }

  public static function logout()
  {
    $_SESSION = array();
    session_destroy();
    return true;
  }

  /**
   * idから投稿を取得
   * @param int $$id
   * @return array|bool $posts|false
   */
  public static function getPost($id)
  {
    $sql = "SELECT * FROM post WHERE contributer_id = ?";
    $arr = [];
    $arr[] = $id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $posts = $stmt->fetchAll();
      return $posts;
    } catch (Exception $e) {
      echo $e;
      return false;
    }
  }

  /**
   * 投稿をすべて取得
   * @return array|bool $posts|false
   */
  public static function getAllPost()
  {
    $sql = "SELECT * FROM post";

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute();
      $posts = $stmt->fetchAll();
      return $posts;
    } catch (Exception $e) {
      echo $e;
      return false;
    }
  }

  /**
   * 新規登録処理
   * @param string|int $contributer_id, $title, $text, $image
   * @return bool true|false
   */
  public static function create($contributer_id, $title, $text, $image)
  {
    $result = false;
    $sql = "INSERT INTO post(contributer_id, title, text, image) VALUES (?,?,?,?)";

    $arr = [];
    $arr[] = $contributer_id;
    $arr[] = $title;
    $arr[] = $text;
    $arr[] = $image;

    try {
      $stmt = connect()->prepare($sql);
      $result = $stmt->execute($arr);
      return $result;
    } catch (Exception $e) {
      echo $e;
      return $result;
    }
  }
}