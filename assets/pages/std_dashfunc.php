<?php
include(__DIR__ . "/../php/config.php");
function home(){
    echo "<script>$('#std_home').addClass('active');</script>";
}
function send(){
    echo "<script>$('#std_send').addClass('active');</script>";
    include(__DIR__ . "/std_send.php");
}
function requests(){
    echo "<script>$('#std_get').addClass('active');</script>";
    include(__DIR__ . "/std_get.php");
}
function profile(){
    include(__DIR__ . "/std_profile.php");
}
?>