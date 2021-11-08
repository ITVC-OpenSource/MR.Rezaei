<?php
if (!isset($_SESSION)) {
  session_start();
}
$server = "http://localhost:8080/";
$dbh = "localhost";
$dbu = "root";
$dbp = "";
$dbn = "dbstd";
$dbc = mysqli_connect($dbh , $dbu , $dbp , $dbn);
$PDO = new PDO("mysql:host=$dbh;dbname=$dbn" , $dbu , $dbp);
if (!$dbc or !$PDO) {
  die("Database connection error!<br>Please try later...");
} else {
    $PDO->query("SET NAMES utf8");
}
if (isset($_COOKIE['uname']) AND isset($_COOKIE['passw']) || $_COOKIE['uname'] !=="out" AND $_COOKIE['passw'] !=="out") {
  $uname = $_COOKIE['uname'];
  $passw = $_COOKIE['passw'];
  $user_query = "SELECT * FROM users WHERE uname = $uname AND passw = $passw";
  $user_quexe = $PDO->query($user_query);
  if ($user_quexe->rowCount() == 1) {
    $user_data = $user_quexe->fetch(PDO::FETCH_ASSOC);
    if ($user_data['type'] == "full_admin") {
      $type = "مدیر کل";
    } else if ($user_data['type'] == "admin") {
        $type = "مدیر";
    }else if ($user_data['type'] == "student") {
        $type = "دانش آموز";
    }
  }else{
    $user_data = [];
    $user_data['type'] = "student";
    $type = "";
    echo "<script>
      if (location.pathname === '/login/' || location.pathname === '//login/') {
        // code...
      }else{
        location.assign('" . $server . "/login/');
      }
    </script>";
  }
} else {
  $user_data = [];
  $user_data['type'] = "student";
  $type = "";
  echo "<script>
    if (location.pathname === '/login/' || location.pathname === '//login/') {
      // code...
    }else{
      location.assign('" . $server . "/login/');
    }
  </script>";
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>دبیرستان استعداد های درخشان شهید دکتر رمضانخانی</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo $server; ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $server; ?>/assets/css/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo $server; ?>/assets/css/bootstrap-icons.min.css">
<link rel="stylesheet" href="<?php echo $server; ?>/assets/css/fontawesome-all.css">
<link rel="stylesheet" href="<?php echo $server; ?>/assets/css/style.min.css">
<base href="<?php echo $server; ?>/">
<script src="<?php echo $server; ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo $server; ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo $server; ?>/assets/js/app.js"></script>
</head>
