<?php
session_start();
$server = "http://localhost:8080";
header("Access-Control-Allow-Origin: " . $server);
$dbh = "localhost";
$dbu = "root";
$dbp = "";
$dbn = "dbstd";
$dbc = mysqli_connect($dbh , $dbu , $dbp , $dbn);
$PDO = new PDO("mysql:host=$dbh;dbname=$dbn" , $dbu , $dbp);
if (!$dbc) {
  echo "Database connection error!<br>Please try later...";
} else {
    $PDO->query("SET NAMES utf8");
}
?>
