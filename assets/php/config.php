<?php
session_start();
$server = "http://localhost:8080";
$dbh = "localhost";
$dbu = "root";
$dbp = "";
$dbn = "DBstd";
$dbc = mysqli_connect($dbh , $dbu , $dbp , $dbn);
$PDO = new PDO("mysql:host=$dbh;dbname=$dbn" , $dbu , $dbp);
if (!$dbc) {
  echo "Database connection error!<br>Please try later...";
}
if (isset($_COOKIE['uname']) AND isset($_COOKIE['passw'])) {
  $uname = $_COOKIE['uname'];
  $passw = $_COOKIE['passw'];
  $user_query = "SELECT * FROM users WHERE uname = $uname AND passw = $passw";
  $user_quexe = $PDO->query($user_query);
  if ($user_quexe->rowCount() == 1) {
    $user_data = $user_quexe->fetch(PDO::FETCH_ASSOC);
  }else{
    header("location: /login/");
  }
} else {
  header("location: /login/");
}
?>
<head>
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
<script>
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
try {
  if (localStorage.getItem("uname") !==null || localStorage.getItem("passw") !==null) {
    var uname = localStorage.getItem("uname");
    var passw = localStorage.getItem("passw");
  }else {
    if (location.href === "<?php echo $server ?>/login/" || location.href === "<?php echo $server ?>/login") {}else{
        location.assign("/login/");
    }
  }
} catch (e) {
  location.assign("/login/");
}
function splash() {
    document.body.innerHTML += "<div class='splash'><img src='assets/img/loader.svg'></div>";
}
function unsplash() {
    document.querySelector(".splash").remove();
}
$("body").addClass("bg-light");
setTimeout(() => {
  document.querySelector(".four-sado-four-container").remove();
  document.querySelector(".four-sado-four-style").remove();
} , 2);
</script>
</head>
