<?php
include(__DIR__ . "/../php/config.php");
function home() {
    echo "<script>$('#home').addClass('active');</script>";
}
function add_user() {
    include(__DIR__ . "/adduser.php");
    echo "<script>$('#add_user').addClass('active');$('body').addClass('text-center');</script>";
}
function edit_user() {
    include(__DIR__ . "/edituser.php");
    echo "<script>$('#edit_user').addClass('active');</script>";
}
function requests() {
    include(__DIR__ . "/get.php");
    echo "<script>$('#requests').addClass('active');</script>";
}
?>