<?php
include(__DIR__ . "/../php/config.php");
function home() {
    include(__DIR__ . "/home.php");
    echo "<script>$('#std_home').addClass('active');</script>";
}
function requests(){
    echo "<script>$('#std_get').addClass('active');</script>";
    include(__DIR__ . "/get.php");
}
function profile() {
    include(__DIR__ . "/profile.php");
    echo "<script>document.querySelector('.profile').classList.add('active');</script>";
}
?>