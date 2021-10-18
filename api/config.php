<?php
session_start();
$server = "http://localhost:8080";
if (!isset($_SESSION['uname'])) {
    //header("location: " . $server . "/login/");
}
$dbh = "localhost";
$dbu = "root";
$dbp = "";
$dbn = "DBstd";
$dbc = mysqli_connect($dbh , $dbu , $dbp , $dbn);
$PDO = new PDO("mysql:host=$dbh;dbname=$dbn" , $dbu , $dbp);
if (!$dbc) {
  echo "Database connection error!<br>Please try later...";
}
?>