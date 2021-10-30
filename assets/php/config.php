<?php
if (!isset($_SESSION)) {
  session_start();
}
$server = "http://localhost:8080";
$dbh = "localhost";
$dbu = "root";
$dbp = "";
$dbn = "dbstd";
$dbc = mysqli_connect($dbh , $dbu , $dbp , $dbn);
$PDO = new PDO("mysql:host=$dbh;dbname=$dbn" , $dbu , $dbp);
if (!$dbc or !$PDO) {
  echo "Database connection error!<br>Please try later...";
}
if (isset($_COOKIE['uname']) AND isset($_COOKIE['passw']) || $_COOKIE['uname'] !=="out" AND $_COOKIE['passw'] !=="out") {
  $uname = $_COOKIE['uname'];
  $passw = $_COOKIE['passw'];
  $user_query = "SELECT * FROM users WHERE uname = $uname AND passw = $passw";
  $user_quexe = $PDO->query($user_query);
  if ($user_quexe->rowCount() == 1) {
    $user_data = $user_quexe->fetch(PDO::FETCH_ASSOC);
  }else{
    echo "<script>
      if (location.pathname === '/login/') {
        // code...
      }else{
        //slocation.assign('" . $server . "/login/');
      }
    </script>";
  }
} else {
  echo "<script>
    if (location.pathname === '/login/') {
      // code...
    }else{
      //location.assign('" . $server . "/login/');
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
<script>
const api_server = "<?php echo $server ?>/api";
var cookies = document.cookie.split("; ");
var $_COOKIE = [];
cookies.forEach((cookie) => {
    let c = cookie.split("=");
    $_COOKIE[c[0]] = c[1];
});
var cci = setInterval(() => {
  //console.clear();
} , 100);
window.onload = () => {
  setTimeout(() => {clearInterval(cci)} , 1);
  //console.clear();
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
if ($_COOKIE["uname"] !==undefined || $_COOKIE["passw"] !==undefined) {}else {
}
function splash() {
    document.body.innerHTML += "<div class='splash'><img src='assets/img/loader.svg'></div>";
}
function unsplash() {
    document.querySelector(".splash").remove();
}
$("body").addClass("bg-light");
function internetError(){
  document.body.innerHTML += `
  <div class="modal-dialog internetError" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-body p-4 text-center">
        <h5 class="mb-0">خطا در بارگذاری اطلاعات</h5>
        <p class="mb-0">لطفاً اتصال خود به اینترنت را بررسی کنید</p>
      </div>
      <div class="modal-footer flex-nowrap p-0">
        <button onclick="unInternetError();" style="width: 100%;" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>تایید</strong></button>
      </div>
    </div>
  </div>`;
}
function Box(title , value , cls){
  document.body.innerHTML += `
  <div class="${cls}">
  <div class='drk-bg'></div>
    <div class="modal-dialog Box" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-body p-4 text-center">
          <h5 class="mb-0">${title}</h5>
          <p class="mb-0">${value}</p>
        </div>
        <div class="modal-footer flex-nowrap p-0">
          <button onclick="unBox('${cls}');" style="width: 100%;" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>تایید</strong></button>
        </div>
      </div>
    </div>
  </div>`;
}
function noneTitleBox(value , cls){
  document.body.innerHTML += `
  <div class="Box modal-dialog Box ${cls}" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-body p-4 text-center">
        <p class="mb-0">${value}</p>
      </div>
      <div class="modal-footer flex-nowrap p-0">
        <button onclick="unBox('${cls}');" style="width: 100%;" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>تایید</strong></button>
      </div>
    </div>
  </div>`;
}
function unBox(cls) {
  document.querySelector("." + cls).remove();
}
window.onOnline = () => {
  unInternetError();
}
window.onOffline = () => {
  internetError();
}
function unInternetError() {
  if (navigator.onLine === "true") {
    if (document.querySelector(".internetError") !==null) {
      document.querySelector(".internetError").remove();
    }
  }else {
    if (document.querySelector(".internetError") !==null) {
      document.querySelector(".internetError").remove();
    }
    internetError();
  }
}
</script>
</head>
